/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/role/form.js":
/*!***********************************!*\
  !*** ./resources/js/role/form.js ***!
  \***********************************/
/***/ (function() {

eval("// выбрать все права в группе\n$('.check-group').change(function () {\n  $(\".permission.group-\".concat(this.dataset.group_id)).prop('checked', this.checked);\n}); // выбрать все права\n\n$('#check_all').change(function () {\n  $(\".permission\").prop('checked', this.checked);\n}); // убрать галочкы с \"Выбрать все\"\n\n$(\".permission\").change(function () {\n  $('#check_all').prop('checked', false);\n  $(\"#group_\".concat(this.dataset.group_id)).prop('checked', false);\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcm9sZS9mb3JtLmpzPzQ1OTgiXSwibmFtZXMiOlsiJCIsImNoYW5nZSIsImRhdGFzZXQiLCJncm91cF9pZCIsInByb3AiLCJjaGVja2VkIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBQSxDQUFDLENBQUMsY0FBRCxDQUFELENBQWtCQyxNQUFsQixDQUF5QixZQUFZO0FBQ2pDRCxFQUFBQSxDQUFDLDZCQUFzQixLQUFLRSxPQUFMLENBQWFDLFFBQW5DLEVBQUQsQ0FBZ0RDLElBQWhELENBQXFELFNBQXJELEVBQWdFLEtBQUtDLE9BQXJFO0FBQ0gsQ0FGRCxFLENBSUE7O0FBQ0FMLENBQUMsQ0FBQyxZQUFELENBQUQsQ0FBZ0JDLE1BQWhCLENBQXVCLFlBQVk7QUFDL0JELEVBQUFBLENBQUMsZUFBRCxDQUFpQkksSUFBakIsQ0FBc0IsU0FBdEIsRUFBaUMsS0FBS0MsT0FBdEM7QUFDSCxDQUZELEUsQ0FJQTs7QUFDQUwsQ0FBQyxlQUFELENBQWlCQyxNQUFqQixDQUF3QixZQUFZO0FBQ2hDRCxFQUFBQSxDQUFDLENBQUMsWUFBRCxDQUFELENBQWdCSSxJQUFoQixDQUFxQixTQUFyQixFQUFnQyxLQUFoQztBQUNBSixFQUFBQSxDQUFDLGtCQUFXLEtBQUtFLE9BQUwsQ0FBYUMsUUFBeEIsRUFBRCxDQUFxQ0MsSUFBckMsQ0FBMEMsU0FBMUMsRUFBcUQsS0FBckQ7QUFDSCxDQUhEIiwic291cmNlc0NvbnRlbnQiOlsiLy8g0LLRi9Cx0YDQsNGC0Ywg0LLRgdC1INC/0YDQsNCy0LAg0LIg0LPRgNGD0L/Qv9C1XG4kKCcuY2hlY2stZ3JvdXAnKS5jaGFuZ2UoZnVuY3Rpb24gKCkge1xuICAgICQoYC5wZXJtaXNzaW9uLmdyb3VwLSR7dGhpcy5kYXRhc2V0Lmdyb3VwX2lkfWApLnByb3AoJ2NoZWNrZWQnLCB0aGlzLmNoZWNrZWQpXG59KVxuXG4vLyDQstGL0LHRgNCw0YLRjCDQstGB0LUg0L/RgNCw0LLQsFxuJCgnI2NoZWNrX2FsbCcpLmNoYW5nZShmdW5jdGlvbiAoKSB7XG4gICAgJChgLnBlcm1pc3Npb25gKS5wcm9wKCdjaGVja2VkJywgdGhpcy5jaGVja2VkKVxufSlcblxuLy8g0YPQsdGA0LDRgtGMINCz0LDQu9C+0YfQutGLINGBIFwi0JLRi9Cx0YDQsNGC0Ywg0LLRgdC1XCJcbiQoYC5wZXJtaXNzaW9uYCkuY2hhbmdlKGZ1bmN0aW9uICgpIHtcbiAgICAkKCcjY2hlY2tfYWxsJykucHJvcCgnY2hlY2tlZCcsIGZhbHNlKTtcbiAgICAkKGAjZ3JvdXBfJHt0aGlzLmRhdGFzZXQuZ3JvdXBfaWR9YCkucHJvcCgnY2hlY2tlZCcsIGZhbHNlKTtcbn0pIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9yb2xlL2Zvcm0uanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/role/form.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/role/form.js"]();
/******/ 	
/******/ })()
;