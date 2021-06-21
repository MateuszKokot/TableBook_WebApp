import React from "react";
import AppContext from "../../context";
import List from "../../components/List/List";

const RezerwacjeView = () => (
  <AppContext.Consumer>
    {(context) => <List items={context.rezerwacje} />}
  </AppContext.Consumer>
);

export default RezerwacjeView;
