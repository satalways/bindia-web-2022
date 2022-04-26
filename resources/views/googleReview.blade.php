<div class="googleReviewOuter">
    <div class="googleReview">
        <a href="{{ $link }}" target="_blank">
            <table>
                <tbody>
                <tr>
                    <td class="td1">
                        <img src="{{ asset('images/google-logo-r.svg') }}" alt="Google Review" title="Google Review">
                    </td>
                    <td class="td2">
                        <div class="title">Google Reviews</div>
                        <div class="rating">
                            {{ number_format($rating,1) }}
                            <span class="stars">
                                @for($x=1; $x<=round($rating,0); $x++)
                                    <i class="fa fa-star font-yellow"></i>
                                @endfor
                                @for($x=5; $x>round($rating,0); $x--)
                                    <i class="fa fa-star"></i>
                                @endfor

                                <br>
                                <div class="rev">
                                    {{ $numberOfReviews }} reviews
                                </div>
                            </span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </a>
    </div>
</div>
