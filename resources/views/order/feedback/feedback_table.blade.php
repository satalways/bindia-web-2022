<table class="table">
    <tr>
        <td>Name:</td>
        <td>{{ $name }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $email }}</td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td>{{ $phone }}</td>
    </tr>

    @for($key=0; $key<=12; $key++)
        @if(!empty($feedback->{'question_' . $key}))
            <tr>
                <td>{{ $feedback->{'question_' . $key} }}</td>
                <td class="bold">
                    @if( $feedback->{'question_' . $key . '_answer'} == -1 )
                        N/A
                    @elseif ( str_starts_with($feedback->{'question_' . $key . '_answer'}, 'rating_') )
                        <img src="{{ rating_image( substr($feedback->{'question_' . $key . '_answer'}, 7) ) }}"
                    @else
                        {{ $feedback->{'question_' . $key . '_answer'} }}
                    @endif
                </td>
            </tr>
        @endif
    @endfor

    <tr>
        <td>FeedBack ID</td>
        <td class="bold">{{ $id }}</td>
    </tr>

    @if (isset($path))
        <tr>
            <td>Uploaded File</td>
            <td>
                <a href="{{ $fileurl }}">{{ basename($path) }}</a>
            </td>
        </tr>
    @endif
</table>
