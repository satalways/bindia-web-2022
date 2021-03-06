var LastDeliveryFee = 0;

var datePicker = function (minDate, minTime) {
    $('#date').pickadate({
        //weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true,
        format: 'dd-mm-yyyy',
        //formatSubmit: 'dd-mm-yyyy',
        disable: [
            [date('Y'), 11, 24],
            [date('Y'), 11, 31],
            [date('Y', strtotime('next year')), 11, 24],
            [date('Y', strtotime('next year')), 11, 31],
        ],
        firstDay: 1,
        min: minDate,
        onClose: function () {
            // var T = $('[name=time]').pickatime('picker');
            // T.set({min: '18:00'});
            loadItems(false);
        }
    });
    $('[name=time]').pickatime({
        format: 'H:i',
        interval: 5,
        min: minTime,
        max: '21:00',
        clear: ''
    });
}

var loadItems = function (loadDiv = true) {
    if (loadDiv) showLoader();

    var Form = $('#checkoutForm');

    if (Form.length === 0) {
        $.ajax({
            url: route('checkout.post'),
            method: 'post',
            data: {action: 'updateSessionCart'},
            error: function () {
                hideLoader();
            }
        }).done(function (data) {
            hideLoader();
            initObjects(data);
        });
    } else {
        Form.find('[name=action]').val('updateSessionCart');
        Form.ajaxSubmit({
            error: function (e1, e2, e3) {
                console.error(e3);
            },
            success: function (data) {
                console.error(data);
                hideLoader();
                if (data.error) {
                    alert(data.error);
                } else {
                    initObjects(data);
                }
            }
        });
    }
}

var initObjects = function (data) {
    if (!data.html) return;
    $('#content').html(data.html);
    datePicker(data.minDate, data.minTime);
    loadCookieData();

    $('#shipping_address').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            limit: 12,
            async: true,
            //displayKey: 'tekst',
            display: 'forslagstekst',
            templates: {
                empty: [
                    '<div class="empty-message">',
                    'no suggessions',
                    '</div>'
                ].join('\n'),
                suggestion: function (data) {
                    return '<div class="address">' + data.tekst + '</div>';
                }
            },
            source: function (query, processSync, processAsync) {
                //processSync(['It will load, Please wait...']);
                return $.ajax({
                    url: route('checkout.address'),
                    type: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function (json) {
                        // in this example, json is simply an array of strings
                        return processAsync(json);
                    }
                });
            }
        })
        .on('typeahead:selected', function (evt, item) {
            if (item.data.postnr) {
                $('#postal_code').val(item.data.postnr);
                if (item.data.postnrnavn) {
                    $('#shipping_city').val(item.data.postnrnavn);
                } else if (item.data.supplerendebynavn) {
                    $('#shipping_city').val(item.data.supplerendebynavn);
                }
                var Form = $('#checkoutForm');
                $('#shipping_address').trigger('blur').removeClass('error');
                Form.find('[name=action]').val('updateSessionCart');
                Form.trigger('submit');
            } else {
                $('#postal_code').val('');
                $('#shipping_address').trigger('blur').addClass('error');
                setTimeout(function () {
                    $('#shipping_address').trigger('focus');
                }, 100);
                $('#checkoutButton').prop('disabled', true);
                $('#time').val('');
            }
        })
        .on('typeahead:asyncrequest', function () {
            $(this).addClass('loading');
        })
        .on('typeahead:asynccancel typeahead:asyncreceive', function () {
            $(this).removeClass('loading');
        })
    ;

    $('#shipping_address, #time').trigger('input');

    if (data.isDelivery && isWolt && typeof data.DeliveryData.error !== 'undefined' && data.DeliveryData.error !== '') {
        LastDeliveryFee = data.delivery_fee;
        $('#checkoutButton').prop('disabled', true);
        alert(data.DeliveryData.error);
    } else if (data.isDelivery && $.trim(data.delivery_fee) !== '' && data.delivery_fee !== LastDeliveryFee) {
        LastDeliveryFee = data.delivery_fee;
        alert(LastDeliveryFee);
        //alert('The delivery fee for this order is ' + LastDeliveryFee);
    }
}

var loadCookieData = function () {
    $('input.cookie').each(function () {
        var currentVal = $(this).val();
        if (!currentVal || currentVal === '') {
            //console.error(Cookies.get($(this).attr('name')));
            $(this).val(Cookies.get($(this).attr('name')))
        }
    })
}

$(function () {
    loadItems();

    $(document)
        .on('click', '#redeemGiftcard', function (e) {
            e.preventDefault();
            showLoader();

            $.ajax({
                url: route('giftcard.post'),
                method: 'post',
                data: {action: 'checkGiftCards', string: $('#giftcard').val()},
                error: function (e1, e2, e3) {
                    hideLoader();
                    alert(e3);
                }
            }).done(function (data) {
                hideLoader();
                if (data.substring(0, 6) === 'mailOK') {
                    alert(gc_email_sent);
                } else if (data.substring(0, 2) === 'OK') {
                    loadItems();
                } else {
                    alert(data);
                }
            });
        })
        .on('keydown', '#giftcard', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                e.stopPropagation();
                $('#redeemGiftcard').trigger('click');
            }
        })
        .on('change', '.update2', function () {
            const Form = $('#checkoutForm');
            Form.find('[name=action]').val('updateSessionCart2');
            Form.trigger('submit');
        })
        .on('click', '.update', function () {
            var Form = $('#checkoutForm');
            Form.find('[name=action]').val('updateSessionCart');
            Form.trigger('submit');
        })
        .on('submit', '#checkoutForm', function (e) {
            e.preventDefault();
            var Action = $('#checkoutForm [name=action]').val();

            if (Action !== 'updateSessionCart2') {
                showLoader();

                //console.error($('#postal_code').val());
            }
            $('#checkoutForm').ajaxSubmit({
                error: function (e1, e2, e3) {
                    hideLoader();
                    alert(e3);
                },
                success: function (data) {
                    if (typeof data === 'object') {
                        hideLoader();
                        if (data.message) {
                            alert(data.message);
                        }
                        if (data.new_time) {
                            $('[name=time]').val(data.new_time);
                        }

                        if (Action === 'updateSessionCart') {
                            hideLoader();
                            if (data.DeliveryData.error) {
                                $('#checkoutButton').prop('disabled', true);
                                alert(data.DeliveryData.error);
                                return false;
                            } else if (isWolt && data.is_delivery && (data.post.shipping_postal_code === '' || data.post.shipping_address === '')) {
                                $('#checkoutButton').prop('disabled', true);
                                $('#shipping_address').addClass('error')
                                $('#postal_code').val('');
                                return false;
                            } else if (!isWolt && data.is_delivery && $.trim(data.delivery_fee) === '' && data.post.shipping_postal_code && data.post.shipping_address) {
                                $('#checkoutButton').prop('disabled', true);
                                $('#shipping_address').addClass('error')
                                $('#postal_code').val('');
                                //$('#shipping_address').val('');
                                return false;
                            }
                            initObjects(data);
                        } else if (Action === 'makeOrder') {
                            if (data.error) {
                                hideLoader();
                                alert(data.error);
                            } else if (data.details) {
                                hideLoader();
                                alert(data.details);
                            } else if (data.reason) {
                                hideLoader();
                                alert(data.reason);
                            } else if (data.substring(0, 4) === 'GOTO') {
                                window.location.href = data.substring(4);
                            } else {
                                hideLoader();
                                alert(data);
                            }
                        }
                    } else if (Action === 'makeOrder') {
                        if (data.substring(0, 4) === 'GOTO') {
                            window.location.href = data.substring(4);
                        } else {
                            hideLoader();
                            alert(data);
                        }
                    }
                }
            });
        })
        .on('click', '#removeGCButton', function (e) {
            e.preventDefault();

            $('#giftcard').val('');
            var Form = $('#checkoutForm');
            Form.find('[name=action]').val('updateSessionCart');
            Form.trigger('submit');
        })
        .on('click', '#checkoutButton', function (e) {
            e.preventDefault();

            var Form = $('#checkoutForm');
            Form.find('[name=action]').val('makeOrder');
            Form.trigger('submit');
        })
        .on('change', '.cookie', function () {
            Cookies.set($(this).attr('name'), $(this).val(), {expires: 365});
        })
        .on('input', '#shipping_address', function () {
            var cb = $('#checkoutButton');
            var sa = $('#shipping_address');

            if ($.trim($(this).val()) === '') {
                cb.prop('disabled', true);
                sa.addClass('error');
                sa.removeClass('success');
                $('#postal_code').val('');
                return;
            }
            var r = /\d+/g;
            //var s = $.trim($(this).val());
            var s = sa.val();
            var result = s.match(r);

            if (!result) {
                $('#postal_code').val('');
                sa.addClass('error');
                sa.removeClass('success');
                cb.prop('disabled', true);
                return;
            }

            var isPostalCode = false;
            $.each(result, function (i, val) {
                if (val.length === 4) isPostalCode = true;
            });

            if (!isPostalCode) {
                $('#postal_code').val('');
                sa.addClass('error');
                sa.removeClass('success');
                cb.prop('disabled', true);
                return;
            }

            sa.removeClass('error');
            sa.addClass('success');
            cb.prop('disabled', false);
        })
        .on('change', '#time', function () {
            if ($(this).val() === '') {
                $(this).addClass('error');
                $(this).removeClass('success');
            } else {
                $(this).addClass('success');
                $(this).removeClass('error');
                $('#checkoutButton').prop('disabled', false);
            }

            if ($('#shipping_address').hasClass('error')) $(this).val('');
        })
});


// setInterval(function () {
//     var FormData = $('#checkoutForm').serialize() + '&action=checkTime';
//     $.ajax({
//         url: route('checkout.post'),
//         method: 'post',
//         data: FormData,
//         error: function (e1, e2, e3) {
//             console.error(e3);
//         }
//     }).done(function (data) {
//         if (data) {
//             //console.error(data);
//             var $input = $('[name=time]').pickatime();
//             var picker = $input.pickatime('picker');
//             picker.set('select', data);
//         }
//     });
// }, 10000);
