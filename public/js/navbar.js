/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/navbar.js":
/*!********************************!*\
  !*** ./resources/js/navbar.js ***!
  \********************************/
/***/ (() => {

eval("var scrollpos = window.scrollY;\nvar header = document.getElementById(\"mainNav\");\nvar header_height = header.offsetHeight;\nvar homePg = 'http://fishbowllab.me/';\nconsole.log(homePg);\nvar currentPg = window.location.href;\nalert(\"Nav\"); // Fixes navbar's position and color if not on the homepage\n\nif (currentPg != homePg) {\n  //header.classList.add(\"navbar-fixed\");\n  header.style.position = \"fixed\";\n  header.style.top = 0;\n  header.style.backgroundColor = \"red\";\n}\n\nvar add_class_on_scroll = function add_class_on_scroll() {\n  return header.classList.add(\"navbar-shrink\");\n};\n\nvar remove_class_on_scroll = function remove_class_on_scroll() {\n  return header.classList.remove(\"navbar-shrink\");\n};\n\nwindow.addEventListener('scroll', function () {\n  scrollpos = window.scrollY;\n\n  if (scrollpos >= header_height) {\n    add_class_on_scroll();\n  } else {\n    remove_class_on_scroll();\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbmF2YmFyLmpzP2JiMTYiXSwibmFtZXMiOlsic2Nyb2xscG9zIiwid2luZG93Iiwic2Nyb2xsWSIsImhlYWRlciIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJoZWFkZXJfaGVpZ2h0Iiwib2Zmc2V0SGVpZ2h0IiwiaG9tZVBnIiwiY29uc29sZSIsImxvZyIsImN1cnJlbnRQZyIsImxvY2F0aW9uIiwiaHJlZiIsImFsZXJ0Iiwic3R5bGUiLCJwb3NpdGlvbiIsInRvcCIsImJhY2tncm91bmRDb2xvciIsImFkZF9jbGFzc19vbl9zY3JvbGwiLCJjbGFzc0xpc3QiLCJhZGQiLCJyZW1vdmVfY2xhc3Nfb25fc2Nyb2xsIiwicmVtb3ZlIiwiYWRkRXZlbnRMaXN0ZW5lciJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBSUEsU0FBUyxHQUFHQyxNQUFNLENBQUNDLE9BQXZCO0FBQ0EsSUFBTUMsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsU0FBeEIsQ0FBZjtBQUNBLElBQU1DLGFBQWEsR0FBR0gsTUFBTSxDQUFDSSxZQUE3QjtBQUVBLElBQU1DLE1BQU0sR0FBRyx3QkFBZjtBQUNBQyxPQUFPLENBQUNDLEdBQVIsQ0FBWUYsTUFBWjtBQUNBLElBQUlHLFNBQVMsR0FBR1YsTUFBTSxDQUFDVyxRQUFQLENBQWdCQyxJQUFoQztBQUNBQyxLQUFLLENBQUMsS0FBRCxDQUFMLEMsQ0FDQTs7QUFDQSxJQUFJSCxTQUFTLElBQUlILE1BQWpCLEVBQXdCO0FBQ3BCO0FBQ0FMLEVBQUFBLE1BQU0sQ0FBQ1ksS0FBUCxDQUFhQyxRQUFiLEdBQXdCLE9BQXhCO0FBQ0FiLEVBQUFBLE1BQU0sQ0FBQ1ksS0FBUCxDQUFhRSxHQUFiLEdBQWlCLENBQWpCO0FBQ0FkLEVBQUFBLE1BQU0sQ0FBQ1ksS0FBUCxDQUFhRyxlQUFiLEdBQStCLEtBQS9CO0FBQ0g7O0FBRUQsSUFBTUMsbUJBQW1CLEdBQUcsU0FBdEJBLG1CQUFzQjtBQUFBLFNBQU1oQixNQUFNLENBQUNpQixTQUFQLENBQWlCQyxHQUFqQixDQUFxQixlQUFyQixDQUFOO0FBQUEsQ0FBNUI7O0FBQ0EsSUFBTUMsc0JBQXNCLEdBQUcsU0FBekJBLHNCQUF5QjtBQUFBLFNBQU1uQixNQUFNLENBQUNpQixTQUFQLENBQWlCRyxNQUFqQixDQUF3QixlQUF4QixDQUFOO0FBQUEsQ0FBL0I7O0FBRUF0QixNQUFNLENBQUN1QixnQkFBUCxDQUF3QixRQUF4QixFQUFrQyxZQUFXO0FBQ3pDeEIsRUFBQUEsU0FBUyxHQUFHQyxNQUFNLENBQUNDLE9BQW5COztBQUVBLE1BQUlGLFNBQVMsSUFBSU0sYUFBakIsRUFBZ0M7QUFDaENhLElBQUFBLG1CQUFtQjtBQUNsQixHQUZELE1BR0s7QUFDTEcsSUFBQUEsc0JBQXNCO0FBQ3JCO0FBQ0osQ0FURCIsInNvdXJjZXNDb250ZW50IjpbImxldCBzY3JvbGxwb3MgPSB3aW5kb3cuc2Nyb2xsWTtcclxuY29uc3QgaGVhZGVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJtYWluTmF2XCIpO1xyXG5jb25zdCBoZWFkZXJfaGVpZ2h0ID0gaGVhZGVyLm9mZnNldEhlaWdodDtcclxuXHJcbmNvbnN0IGhvbWVQZyA9ICdodHRwOi8vZmlzaGJvd2xsYWIubWUvJztcclxuY29uc29sZS5sb2coaG9tZVBnKTtcclxubGV0IGN1cnJlbnRQZyA9IHdpbmRvdy5sb2NhdGlvbi5ocmVmO1xyXG5hbGVydChcIk5hdlwiKVxyXG4vLyBGaXhlcyBuYXZiYXIncyBwb3NpdGlvbiBhbmQgY29sb3IgaWYgbm90IG9uIHRoZSBob21lcGFnZVxyXG5pZiAoY3VycmVudFBnICE9IGhvbWVQZyl7XHJcbiAgICAvL2hlYWRlci5jbGFzc0xpc3QuYWRkKFwibmF2YmFyLWZpeGVkXCIpO1xyXG4gICAgaGVhZGVyLnN0eWxlLnBvc2l0aW9uID0gXCJmaXhlZFwiO1xyXG4gICAgaGVhZGVyLnN0eWxlLnRvcD0wO1xyXG4gICAgaGVhZGVyLnN0eWxlLmJhY2tncm91bmRDb2xvciA9IFwicmVkXCI7XHJcbn1cclxuXHJcbmNvbnN0IGFkZF9jbGFzc19vbl9zY3JvbGwgPSAoKSA9PiBoZWFkZXIuY2xhc3NMaXN0LmFkZChcIm5hdmJhci1zaHJpbmtcIik7XHJcbmNvbnN0IHJlbW92ZV9jbGFzc19vbl9zY3JvbGwgPSAoKSA9PiBoZWFkZXIuY2xhc3NMaXN0LnJlbW92ZShcIm5hdmJhci1zaHJpbmtcIik7XHJcblxyXG53aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJywgZnVuY3Rpb24oKSB7IFxyXG4gICAgc2Nyb2xscG9zID0gd2luZG93LnNjcm9sbFk7XHJcblxyXG4gICAgaWYgKHNjcm9sbHBvcyA+PSBoZWFkZXJfaGVpZ2h0KSB7IFxyXG4gICAgYWRkX2NsYXNzX29uX3Njcm9sbCgpO1xyXG4gICAgfVxyXG4gICAgZWxzZSB7IFxyXG4gICAgcmVtb3ZlX2NsYXNzX29uX3Njcm9sbCgpO1xyXG4gICAgfVxyXG59KTtcclxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9uYXZiYXIuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/navbar.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/navbar.js"]();
/******/ 	
/******/ })()
;