module.exports = {
  content: ["./index.php", "./app/**/*.php", "./resources/**/*.{php,vue,js,ts}"],
  theme: {
    container: ({ theme }) => ({
      center: true,
      padding: theme('custom.spacing.gutter'),
    }),
    custom: {
      spacing: {
        gutter: '0.75rem',
      },
    },
    extend: {
      colors: {
        primary: '#f00',
      },
    },
  },
  plugins: [],
};
