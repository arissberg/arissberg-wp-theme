module.exports = {
  prefix: '',
  important: false,
  separator: ':',
  theme: {
    colors: {
      transparent: 'transparent',

      black: '#000',
      blackSemi: 'rgba(0,0,0,0.8)',
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
      orange: '#EA7300',

      blue: {
        100: '#96D8EA',
        200: '#10A2DC',
        300: '#0879B6',
        400: '#005594',
        500: '#053C7E',
        600: '#000029',
      },

      blueSemi: 'rgba(5,60,126,0.8)',

      red: '#E53E3E',

      linkedin: '#007bb6',
      youtube: '#ff0000',
      twitter: '#00aced',
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
    buttonColors: theme => ({
      orange: theme('colors.orange'),
      blue: theme('colors.blue.500'),
    }),
    fontFamily: {
      sans: [
        'Poppins',
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
    extend: {},
  },
  variants: {},
  corePlugins: {
    container: false,
  },
  plugins: [],
};
