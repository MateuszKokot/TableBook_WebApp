import React from "react";
import "./index.css";
import AppContext from "../../context";
import { Provider } from "react-redux";
import { BrowserRouter, Route, Switch } from "react-router-dom";
import TableBookView from "../TableBookView/TableBookView";
import RezerwacjeView from "../RezerwacjeView/RezerwacjeView";
import OpinieView from "../OpinieView/OpinieView";
import KontaktView from "../KontaktView/KontaktView";
import store from "../../store";

import PolitykaPrywatnosciView from "../PolitykaPrywatnosci/PolitykaPrywatnosciView";
import Footer from "./../../components/Footer/Footer";

import Header from "../../components/Header/Header";
import Modal from "../../components/Modal/Modal";

// teraz msuze wyedytowa komponent ListItem
class Root extends React.Component {
  state = {
    rezerwacje: [],
    opinie: [],
    isModalOpen: false,
  };

  addItem = (e, newItem) => {
    e.preventDefault();

    this.setState((prevState) => ({
      [newItem.type]: [...prevState[newItem.type], newItem],
    }));

    this.closeModal();
  };

  closeModal = () => {
    this.setState((prevState) => ({
      isModalOpen: !prevState.isModalOpen,
    }));
  };

  render() {
    const { isModalOpen } = this.state;

    const contextElements = {
      ...this.state,
      addItem: this.addItem,
    };

    return (
      <BrowserRouter>
        <AppContext.Provider value={contextElements}>
          <Header closeModalFn={this.closeModal} />
          <Switch>
            <Provider store={store}>
              <Route exact path="/" component={TableBookView} />
            </Provider>
            <Route path="/rezerwacje" component={RezerwacjeView} />
            <Route path="/opinie" component={OpinieView} />
            <Route
              path="/politykaprywatnosci"
              component={PolitykaPrywatnosciView}
            />
            <Route path="/kontakt" component={KontaktView} />
          </Switch>
          {isModalOpen && <Modal closeModalFn={this.closeModal} />}
          <Footer />
        </AppContext.Provider>
      </BrowserRouter>
    );
  }
}

export default Root;

// 3. Dopasować Form.js do nowych potrzeb
// 4. Przystosować widoki podstron do nowych itemów
// 5. Wyświetlać odpowiednie notatki na podstronach
