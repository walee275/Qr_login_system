import { BrowserQRCodeReader } from '@zxing/library';

const codeReader = new BrowserQRCodeReader();
const videoElement = document.getElementById('preview');
codeReader.decodeFromVideoDevice(undefined, videoElement, (result) => {
  console.log(result.text);
});
