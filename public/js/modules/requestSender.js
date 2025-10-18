/**
 *
 * @param {string} REQUEST_URL request URL
 * @param {object} options request options object
 * @param {Function} onSuccess on success or non-default behaviour callback function
 * @param {Function} onFail on failuor callback
 * @returns {Promise}
 */
async function sendRequest(
    REQUEST_URL,
    options = {},
    onSuccess = () => {},
    onFail = () => {
      console.log(data.error);
    }
  ) {
    const defaults = {
      method: "GET",
      headers: {},
      params: {},
      body: {},
      isJson: true,
      preventDefault: false,
      sameOrigin: true,
    };
  
    // combine options with defaults
    if (
      typeof options === "object" &&
      !Array.isArray(options) &&
      options !== null
    ) {
      Object.assign(defaults, options);
    }
  
    // genereate URL
    if (defaults.sameOrigin === false) {
      REQUEST_URL = new URL(REQUEST_URL);
    } else {
      REQUEST_URL = new URL(SERVER_URL + REQUEST_URL);
    }
  
    // request Options
    const requestOptions = {
      method: defaults.method,
      // headers: defaults.headers,
    };
  
    // set query parameters
    if (
      defaults.method === "GET" &&
      typeof defaults.params === "object" &&
      !Array.isArray(defaults.params) &&
      defaults.params !== null
    ) {
      const object = defaults.params;
      for (const key in object) {
        if (Object.hasOwnProperty.call(object, key)) {
          REQUEST_URL.searchParams.append(key, object[key]);
        }
      }
    }
  
    // set body
    if (
      defaults.method !== "GET" &&
      typeof defaults.headers === "object" &&
      defaults.headers["Content-Type"] === "application/json" &&
      typeof defaults.body === "string"
    ) {
      requestOptions.body = defaults.body;
    } else if (defaults.method !== "GET" && defaults.body instanceof FormData) {
      requestOptions.body = defaults.body;
    } else if (
      defaults.method !== "GET" &&
      typeof defaults.params === "object" &&
      !Array.isArray(defaults.params) &&
      defaults.params !== null
    ) {
      const object = defaults.body;
      const form = new FormData();
      for (const key in object) {
        if (Object.hasOwnProperty.call(object, key)) {
          form.append(key, object[key]);
        }
      }
      requestOptions.body = form;
    }
  
    return await fetch(REQUEST_URL.toString(), requestOptions)
      .then(async (response) => {
        if (defaults.isJson) {
          let responseText = "";
          try {
            responseText = await response.text();
            return JSON.parse(responseText);
          } catch (error) {
            return responseText;
          }
        }
        return response.text();
      })
      .then((data) => {
        if (!defaults.isJson || defaults.preventDefault) {
          return onSuccess(data);
        }
        if (data.status === "success") {
          return onSuccess(data.results);
        } else if (data.status === "failed") {
          return onFail(data.error);
        } else {
          console.log(data);
          return null;
        }
      })
      .catch((error) => console.error(error));
  }
  