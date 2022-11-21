import _ from 'lodash';
window._ = _;

import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

window.Swal = require("sweetalert2");

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.MIX_PUSHER_APP_KEY,
//     wsHost: import.meta.env.MIX_PUSHER_HOST ?? `ws-${import.meta.env.MIX_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.MIX_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.MIX_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.MIX_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
