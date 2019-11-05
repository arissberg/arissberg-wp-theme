module.exports = {
  prefix: '',
  important: false,
  separator: ':',
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      xxl: '1440px',
    },
    colors: {
      transparent: 'transparent',

      black: '#000',
      white: '#fff',

      gray: {
        100: '#F2F2F2',
        200: '#edf2f7',
        300: '#e2e8f0',
        400: '#333333',
        500: '#a0aec0',
        600: '#718096',
        700: '#4a5568',
        800: '#2d3748',
      },

      gold: {
        100: '#f7e6bf',
        200: '#e9cd93',
        300: '#cdba90',
        400: '#b3975a',
      },

      blue: {
        100: '#7ec2ca',
        200: '#6491c6',
        300: '#002d62',
      },

      facebook: '#3b5998',
      twitter: '#00aced',
      instagram: '#c02c69',
      linkedin: '#2b67bc',
      youtube: '#e93223',
    },
    boxShadow: {
      default:
        '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06), 0 0px 1px 0px rgba(0, 0, 0, 0.12)',
      md:
        '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06), 0 0px 1px 0px rgba(0, 0, 0, 0.12)',
      lg:
        '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05), 0 0px 1px 0px rgba(0, 0, 0, 0.12)',
      xl:
        '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04), 0 0px 1px 0px rgba(0, 0, 0, 0.12)',
      '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
      inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
      outline: '0 0 0 3px rgba(66, 153, 225, 0.5)',
      none: 'none',
    },
    fontFamily: {
      sans: [
        'gill-sans-nova',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ],
      serif: ['Georgia', 'Cambria', '"Times New Roman"', 'Times', 'serif'],
      mono: [
        'Menlo',
        'Monaco',
        'Consolas',
        '"Liberation Mono"',
        '"Courier New"',
        'monospace',
      ],
    },
    fontSize: {
      '2xs': '0.75rem',
      xs: '0.875rem',
      sm: '1rem',
      base: '1.125rem',
      lg: '1.25rem',
      xl: '1.5rem',
      '2xl': '1.875rem',
      '3xl': '2.25rem',
      '4xl': '3rem',
      '5xl': '4rem',
      '6xl': '5rem',
      '8xl': '6rem',
    },
    fontWeight: {
      light: '300',
      normal: '400',
      medium: '500',
      semibold: '600',
    },
    container: {
      center: true,
      padding: '2rem',
    },
    extend: {},
  },
  variants: {},
  corePlugins: {
    container: false,
  },
  plugins: [
    require('tailwind-css-variables')(
      {
        colors: 'color',
        padding: false,
        margin: false,
      },
      {
        postcssEachVariables: true,
      }
    ),
  ],
};
