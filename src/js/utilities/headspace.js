function Headspace(element, opts = {}) {
  if (!(this instanceof Headspace)) {
    return new Headspace(...arguments)
  }

  this.element = element
  this.startOffset = optionOrDefault(opts.startOffset, element && element.offsetHeight)
  this.tolerance = optionOrDefault(opts.tolerance, 8)
  this.showAtBottom = optionOrDefault(opts.showAtBottom, true)
  this.classNames = {
    ...{
      base: 'headspace',
      fixed: 'headspace--fixed',
      hidden: 'headspace--hidden',
      hasScrolled: 'headspace--hasScrolled',
    },
    ...opts.classNames
  }

  this._scrollLast = 0
  if (typeof window !== 'undefined') {
    this.init()
  }
}

Headspace.prototype = {
  init () {
    this.addClass(this.classNames.base)
    window.addEventListener('scroll', () => this.debounce(() => handleScroll(this)))
  },
  reset () {
    const classNames = this.classNames
    this.removeClass(classNames.fixed, classNames.hidden, classNames.hasScrolled)
  },
  fix () {
    const classNames = this.classNames
    this.addClass(classNames.fixed)
    this.removeClass(classNames.hidden)
  },
  hide () {
    this.addClass(this.classNames.hidden)
  },
  scrolled() {
    this.addClass(this.classNames.hasScrolled)
  },

  // Accessible for shimming
  addClass() {
    this.element.classList.add(...arguments)
  },
  removeClass () {
    this.element.classList.remove(...arguments)
  },
  debounce (callback) {
    window.requestAnimationFrame(callback)
  }
}

Headspace.isSupported = function () {
  return !!(typeof window !== 'undefined' && window.requestAnimationFrame && 'classList' in document.documentElement)
}

function optionOrDefault (opt, def) {
  return typeof opt !== 'undefined' ? opt : def
}

function handleScroll (instance) {
  const scrollCurrent = window.pageYOffset
  const scrollLast = instance._scrollLast

  if (scrollCurrent <= 0) {
    instance.reset()
  } else if (instance.showAtBottom && (window.innerHeight + scrollCurrent) >= document.body.offsetHeight) {
    instance.fix()
  } else if (scrollCurrent > instance.startOffset && Math.abs(scrollCurrent - scrollLast) >= instance.tolerance) {
    instance[scrollCurrent > scrollLast ? 'hide' : 'fix']()
    instance.scrolled()
  }

  instance._scrollLast = scrollCurrent
}

export default Headspace