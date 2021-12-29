/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
document.addEventListener("DOMContentLoaded", function () {
  Inputmask({
    mask: "V{20}",
    definitions: {
      "V": {
        validator: "[A-Za-z0-9_-]",
        casing: "upper"
      }
    },
    placeholder: '',
    showMaskOnHover: false
  }).mask(document.querySelectorAll('[id-pattern]'));

  (function (window, ResizableTableColumns, undefined) {
    var store = window.store && window.store.enabled ? window.store : null;
    var els = document.querySelectorAll('table.data');

    for (var index = 0; index < els.length; index++) {
      var table = els[index];

      if (table['rtc_data_object']) {
        continue;
      }

      var options = {
        store: store,
        maxInitialWidth: 100
      };

      if (table.querySelectorAll('thead > tr').length > 1) {
        options.resizeFromBody = false;
      }

      new ResizableTableColumns(els[index], options);
    }
  })(window, window.validide_resizableTableColumns.ResizableTableColumns, void 0);
});
/******/ })()
;