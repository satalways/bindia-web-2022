<div class="modal fade" id="copy-order-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="container">
                <div class="bn-left-review-box float-start">
                    <div class="row">
                        <div class="col-lg-12">
                            <div style="padding: 20px 40px">
                                <h2>{{ __('takeaway.copy_order_pop_heading') }}:</h2>
                                <ol>
                                    <li>{{ __('takeaway.li1') }}</li>
                                    <li>{{ __('takeaway.li2') }}</li>
                                    <li>{{ __('takeaway.li3') }}</li>
                                </ol>

                                {!! __('takeaway.p1', ['link' => route('order.copy.last.order.pdf')]) !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="bn-right-review-box float-end">

                </div>
            </div>
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
</div>
