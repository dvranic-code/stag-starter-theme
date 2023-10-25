/**
 *
 * @param {Function} fn The user defined function to execute only upon successful DOM load
 */
export const onReady = (fn) => {
  if (document.readyState !== "loading") {
    fn();
  } else {
    document.addEventListener("DOMContentLoaded", fn);
  }
};

/**
 * Execute a given function after a giving timeout period
 * @param {Function} fn The function to call
 * @param {number} timeout In miliseconds the amount of time to wait
 * @returns {Function}
 */
export const debounce = (fn, timeout) => {
  let timeoutId;

  return function (...args) {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => fn.apply(this, args), timeout);
  };
};