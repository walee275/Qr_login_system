<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>qr generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />

<style>
    audio, canvas, embed, iframe, img, object, svg, video{
        display: inline !important;
    }
</style>
</head>
<body>
    {{-- <img src="data:image/png;base64, {{ base64_encode($qrCode) }} " alt="qr code"> --}}

    <div class="contaner">
        <div class="row">
            <div class="col ">
                <div class=" mx-auto text-center  py-3"><b>Scan Qr Code Here</b> <br> Not regstered yet? <a href="{{ route('admin.student.create') }}" class="">Register</a> </div>
                <div class="text-center"><video id="preview" class=" mt-2"></video></div>
                {{-- <div><p>Not regstered yet? <a href="{{ route('admin.student.create') }}" class="link">Register</a></p></div> --}}

            </div>

        </div>
        <div class="row mt-5 text-center" style="">

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@zxing/library@0.18.4"></script>
<script>
const codeReader = new ZXing.BrowserQRCodeReader();
const videoElement = document.getElementById('preview');
let mediaStream;
let loggedin = '';
loggedin = sessionStorage.getItem('qrscanned');
console.log(loggedin);
    codeReader.decodeFromVideoDevice(undefined, videoElement, (result) => {
    if(result){
        // if(result.text == 'Mehdi Yousuf'){
            console.log(result.text)
            // codeReader.stop()
            function stop(){
                codeReader.stop()
            }
            const data = {
                _token:'{{ csrf_token() }}',
                QrCode: result.text
            }

            fetch('{{ route('qr.scan.check') }}',{
                method: 'POST',
                body:JSON.stringify(data),
                headers: {'Content-Type': 'application/json'},
            }).then(function(response){
                return response.json();
            }).then(function(result){
                if(result.success){
                    console.log(result)
                    // codeReader.stop()
                    // stop();
                    // let url = 'http://localhost/qr_task/public/admin/student/'+ result.id+'/profile';
                    // sessionStorage.setItem('qrscanned', 'Mehdi Yousuf');
                    window.location.href = 'http://localhost/qr_task/public/employee/'+ result.user.id+'/profile';
                    // window.location.replace(url);

                }

            });
        // }
    }else{
        console.log('invalid qr')
    }
});



function stopCamera() {
    mediaStream = videoElement.srcObject;
    const tracks = mediaStream.getTracks();
    tracks.forEach(track => track.stop());
    videoElement.srcObject = null;
}

</script>

{{-- <script type="" src="{{ asset('index.js') }}"></script> --}}

<script>
// const codeReader = new ZXing.BrowserQRCodeReader();
// const videoElement = document.getElementById('videoElement');
// codeReader.decodeFromVideoDevice(undefined, videoElement, (result) => {
//   console.log(result.text);
// });
</script>
</html>
