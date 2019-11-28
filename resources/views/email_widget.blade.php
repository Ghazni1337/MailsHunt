<style>
    .list-group-item {
        font-size: 16px;
    }
    .list-group-item i {
        padding-left: 10px;
        cursor: pointer;
        color: #959595;
    }
    .list-group-item a {
        text-decoration: none;
        color: #959595;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div style="margin-bottom: 10px; text-align: right">
                <span>{{$mailCount}} results&nbsp;&nbsp;&nbsp;</span>
                <button class="btn btn-sm btn-default" onclick="copyAll({{$mails}})" type="button">Copy all</button>&nbsp;
                <button class="btn btn-sm btn-default" onclick="download({{$mails}})" type="button">Export in CSV</button>
            </div>
            <ul class="list-group">
                @foreach($mails as $mail)
                    <li class="list-group-item">{{$mail->mail}}
                        <span style="float: right">
                                <i title="copy" id="copy" onclick="copyMail(this)" class="fas fa-copy"></i>
                                <a title="verify" target="_blank" href="email-verifier/{{$mail->mail}}">
                                    <i class="fas fa-user-check"></i>
                                </a>
                            </span>
                    </li>
                @endforeach
                @if($mailCount > 10)
                    <li class="list-group-item">
                        <button onclick="alert('If you are looking for more results, please contact us!')" class="btn btn-default" type="button">Show more</button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>

@section('js')
    <script>
        var $body = document.getElementsByTagName('body')[0];

        function copyMail(elem) {
            var copyText = $(elem).closest("li").text().trim();

            var $tempInput = document.createElement('INPUT');
            $body.appendChild($tempInput);
            $tempInput.setAttribute('value', copyText);

            $tempInput.select();
            document.execCommand("copy");

            $body.removeChild($tempInput);
        }

        function download(mails) {
            var csvFile = '';
            for (var i = 0; i < mails.length; i++) {
                csvFile += mails[i]['mail'] + "\r\n";
            }
            var blob = new Blob([csvFile], {type: "text/csv"});
            var url = URL.createObjectURL(blob);

            var link = document.createElement("a");
            link.setAttribute("href", url);
            link.setAttribute("download", 'mailshunt.csv');
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        function copyAll(mails) {
            var copy = '';
            for (var i = 0; i < mails.length; i++) {
                if (i === mails.length - 1) {
                    copy += mails[i]['mail'];
                    break;
                }
                copy += mails[i]['mail'] + ", ";
            }

            var $tempInput = document.createElement('INPUT');
            $body.appendChild($tempInput);
            $tempInput.setAttribute('value', copy);

            $tempInput.select();
            document.execCommand("copy");

            $body.removeChild($tempInput);
        }
    </script>
@stop
