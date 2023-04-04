<html>

<head>
    <title>Centrifugo quick start</title>
</head>

<body>
<div id="counter">-</div>
<script src="https://unpkg.com/centrifuge@3.1.0/dist/centrifuge.js"></script>
<script type="text/javascript">
    const container = document.getElementById('counter');

    const centrifuge = new Centrifuge("ws://localhost:8000/connection/websocket", {
        token: "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxIiwiZXhwIjoxNzEyMTIyMDkyLCJpYXQiOjE2ODA1ODYwOTJ9.BeHtUCqb2bV_LG9EEzY9WfzOUJV3HBtuChNlijVdj14"
    });

    centrifuge.on('connecting', function (ctx) {
        console.log(`connecting: ${ctx.code}, ${ctx.reason}`);
    }).on('connected', function (ctx) {
        console.log(`connected over ${ctx.transport}`);
    }).on('disconnected', function (ctx) {
        console.log(`disconnected: ${ctx.code}, ${ctx.reason}`);
    }).connect();

    const sub = centrifuge.newSubscription("channel");

    sub.on('publication', function (ctx) {
        container.innerHTML = ctx.data.value.test;
        document.title = ctx.data.value.test;
        console.log(ctx.data.value.test);
    }).on('subscribing', function (ctx) {
        console.log(`subscribing: ${ctx.code}, ${ctx.reason}`);
    }).on('subscribed', function (ctx) {
        console.log('subscribed', ctx);
    }).on('unsubscribed', function (ctx) {
        console.log(`unsubscribed: ${ctx.code}, ${ctx.reason}`);
    }).subscribe();

</script>
</body>

</html>
