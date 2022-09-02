// @ts-check

/**
 * Build configuration
 *
 * @see {@link https://bud.js.org/guides/getting-started/configure}
 * @param {import('@roots/bud').Bud} app
 */
export default async (app) => {
  app
    /**
     * Application entrypoints
     */
    .entry({
      app: ["@scripts/app", "@styles/app"],
      editor: ["@scripts/editor", "@styles/editor"],
    })

    /**
     * Directory contents to be included in the compilation
     */
    .assets(["images"])

    /**
     * Matched files trigger a page reload when modified
     */
    .watch(["resources/views/**/*", "app/**/*"])

    /**
     * Proxy origin (`WP_HOME`)
     */
    .proxy("https://app.localhost") //TODO change after fork 

    /**
     * Development origin
     */
    .serve({
      host: 'localhost',
      port: 3000,
      ssl: false,
    })

    /**
     * URI of the `public` directory
     */
    .setPublicPath("/app/themes/sage/public/");
};
