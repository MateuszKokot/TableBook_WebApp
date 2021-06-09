import React from "react";
import ReactDOM from "react-dom";
import { Provider } from "react-redux";
import AppHook from "./AppHook";
import store from "./store";

ReactDOM.render(
  <Provider store={store}>
    <AppHook />
  </Provider>,
  document.getElementById("root")
);
