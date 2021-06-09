import React, { Component } from "react";
import Input from "./components/input/input";
import test from "./components/test.json";
import Table from "./components/table/table";
import "./App.css";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      date: "",
      timeFrom: "",
      timeTo: "",
    };
  }
  componentDidMount() {
    let { date } = this.state;
    if (date === "") {
      let today = new Date();
      const day = String(today.getDate()).padStart(2, "0");
      const month = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
      const year = today.getFullYear();
      today = year + "-" + month + "-" + day;
      this.onChangeDay(null, today);
    }
  }
  onChangeDay = (event, day) => {
    this.setState({ date: day ? day : event.target.value });
  };
  onChangeTimeFrom = (event) => {
    const { date } = this.state;
    this.setState({ timeFrom: `${date} ${event.target.value}` });
  };
  onChangeTimeTo = (event) => {
    const { date } = this.state;
    this.setState({ timeTo: `${date} ${event.target.value}` });
  };

  render() {
    const { date, timeFrom, timeTo } = this.state;
    return (
      <div>
        <Input
          type="text"
          name="date"
          placeholder={date}
          onFocus={(e) => (e.target.type = "date")}
          onBlur={((e) => (e.target.type = "text"), this.onChangeDay)}
        />
        <p1>odGodz</p1>
        <Input
          type="text"
          name="timeFrom"
          placeholder="od godziny"
          min="12:00"
          max="22:30"
          onFocus={(e) => (e.target.type = "time")}
          onBlur={((e) => (e.target.type = "text"), this.onChangeTimeFrom)}
        />
        <p1>doGodz</p1>
        <Input
          type="text"
          name="timeTo"
          placeholder="do godziny"
          min="12:30"
          max="23:00"
          onFocus={(e) => (e.target.type = "time")}
          onBlur={((e) => (e.target.type = "text"), this.onChangeTimeTo)}
        />
        <div className="tableWrapper">
          {date &&
            Object.keys(test[date]).map((tableNr) => {
              let object = test[date][tableNr];
              return (
                <Table
                  key={tableNr}
                  name={tableNr}
                  array={object}
                  timeFrom={timeFrom}
                  timeTo={timeTo}
                  day={date}
                >
                  {tableNr}
                </Table>
              );
            })}
        </div>
      </div>
    );
  }
}
export default App;
