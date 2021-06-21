import React from "react";
import AppContext from "../../context";
import styles from "./Form.module.scss";
import Input from "../Input/Input";
import Button from "../Button/Button";
import Title from "../Title/Title";
import Radio from "./FormRadio";

const types = {
  rezerwacje: "rezerwacje",
  opinie: "opinie",
};

const descriptions = {
  rezerwacje: "zarezerwuj stolik",
  opinie: "dodaj opinie",
};

class Form extends React.Component {
  state = {
    type: types.rezerwacje,
    imie: "",
    ileOsob: "",
    data: "",
    tekst: "",
  };
  // ZASTANOWIĆ SIĘ NAD STATE I PRZEPLYWEM DANYCH W OBU POLACH ANSTEPNIE WYSWIETLIC JE NA ODPOWIEDNIK KARTACH
  handleRadioButtonChange = (type) => {
    this.setState({
      type: type,
    });
  };

  handleInputChange = (e) => {
    this.setState({
      [e.target.name]: e.target.value,
    });
    console.log(`
    imie: ${this.state.imie}
    ile osób: ${this.state.ileOsob}
    data: ${this.state.data}
    tekst: ${this.state.tekst}
    `);
  };

  render() {
    const { type } = this.state;

    return (
      <AppContext.Consumer>
        {(context) => (
          <div className={styles.wrapper}>
            <Title> {descriptions[type]}</Title>
            <form
              autoComplete="off"
              className={styles.form}
              onSubmit={(e) => context.addItem(e, this.state)}
            >
              <div className={styles.formOptions}>
                <Radio
                  id={types.rezerwacje}
                  checked={type === types.rezerwacje}
                  changeFn={() =>
                    this.handleRadioButtonChange(types.rezerwacje)
                  }
                >
                  rezerwacja
                </Radio>
                <Radio
                  id={types.opinie}
                  checked={type === types.opinie}
                  changeFn={() => this.handleRadioButtonChange(types.opinie)}
                >
                  opinie
                </Radio>
              </div>
              <Input
                onChange={this.handleInputChange}
                value={this.state.imie}
                name="imie"
                label="Imię i Nazwisko"
              />
              {type !== types.opinie ? (
                <Input
                  onChange={this.handleInputChange}
                  value={this.state.ileOsob}
                  name="ileOsob"
                  label="ile osób"
                />
              ) : null}

              {type === types.rezerwacje ? (
                <Input
                  onChange={this.handleInputChange}
                  value={this.state.data}
                  name="data"
                  label="data"
                />
              ) : null}

              <Input
                onChange={this.handleInputChange}
                value={this.state.tekst}
                tag="textarea"
                name="tekst"
                label="tekst"
              />
              <Button>Dodaj</Button>
            </form>
          </div>
        )}
      </AppContext.Consumer>
    );
  }
}

export default Form;
