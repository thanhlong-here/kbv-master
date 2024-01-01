@extends('ex.kbv.screen')
@section('content')
<div class="content-wrapper">

  <div class="content-body">

      <button id="scancode" name="scancode" onclick="window.ReactNativeWebView.postMessage('On Camera')">
        Scan Code
      </button>

  </div>
</div>
<script>
function awaitPostMessage() {
  let isReactNativePostMessageReady = !!window.originalPostMessage;
  const queue = [];
  let currentPostMessageFn = function store(message) {
    if (queue.length > 100) queue.shift();
    queue.push(message);
  };
  if (!isReactNativePostMessageReady) {
    // const originalPostMessage = window.postMessage;
    Object.defineProperty(window, 'postMessage', {
      configurable: true,
      enumerable: true,
      get() {
        return currentPostMessageFn;
      },
      set(fn) {
        currentPostMessageFn = fn;
        isReactNativePostMessageReady = true;
        setTimeout(sendQueue, 0);
      }
    });
  }

  function sendQueue() {
    while (queue.length > 0) window.postMessage(queue.shift());
  }
}
awaitPostMessage();

</script>
@endsection
