import { defaultAllowedOrigins, defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const appUrl = new URL(env.APP_URL || 'http://localhost:8000');
    const tunnelMatch = appUrl.hostname.match(/^(.*)-\d+(\.asse\.devtunnels\.ms)$/);
    const isDevTunnel = tunnelMatch !== null;
    const viteHost = isDevTunnel
        ? `${tunnelMatch[1]}-5173${tunnelMatch[2]}`
        : appUrl.hostname;
    const hmrHost = env.VITE_HMR_HOST || viteHost;

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
                detectTls: isDevTunnel ? false : null,
                fonts: [
                    bunny('Instrument Sans', {
                        weights: [400, 500, 600],
                        optimizedFallbacks: false,
                    }),
                ],
            }),
            tailwindcss(),
        ],
        server: {
            host: '0.0.0.0',
            port: 5173,
            strictPort: true,
            origin: env.VITE_DEV_SERVER_ORIGIN
                || (isDevTunnel
                    ? `${appUrl.protocol}//${hmrHost}`
                    : `${appUrl.protocol}//${hmrHost}:5173`),
            cors: {
                origin: [defaultAllowedOrigins, appUrl.origin],
            },
            ...(isDevTunnel ? { allowedHosts: [hmrHost] } : {}),
            hmr: {
                host: hmrHost,
                ...(appUrl.protocol === 'https:'
                    ? { protocol: 'wss', clientPort: isDevTunnel ? 443 : 5173 }
                    : {}),
            },
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
    };
});
