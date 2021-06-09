import React, { useState, useEffect } from "react";
import { connect } from "react-redux";
import { fetchTablesAction } from "./actions";
import Input from "./components/input/input";
import test from "./components/test.json";
import Table from "./components/table/table";
import "./App.css";

function AppHook({ fetchTables }) {
  const [date, setDate] = useState("");
  const [timeFrom, setTimeFrom] = useState("");
  const [timeTo, setTimeTo] = useState("");
  const [hiddenTables, setHiddenTables] = useState(true);

  useEffect(() => {
    if (date === "") {
      let today = new Date();
      const day = String(today.getDate()).padStart(2, "0");
      const month = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
      const year = today.getFullYear();
      today = year + "-" + month + "-" + day;
      onChangeDay(null, today);
    }
  });

  useEffect(() => {
    if (timeFrom && timeTo) {
      setHiddenTables(false);
    }
  }, [timeFrom, timeTo]);

  useEffect(() => {
    if (date) {
      fetchTables(date.date);
    }
  }, [date]);

  const onChangeDay = (event, day) => {
    setDate({ date: day ? day : event.target.value });
  };
  const onChangeTimeFrom = (event) => {
    setTimeFrom({ timeFrom: `${date.date} ${event.target.value}` });
  };
  const onChangeTimeTo = (event) => {
    setTimeTo({ timeTo: `${date.date} ${event.target.value}` });
  };

  return (
    <div>
      <Input
        type="text"
        name="date"
        placeholder={date.date}
        onFocus={(e) => (e.target.type = "date")}
        onBlur={((e) => (e.target.type = "text"), onChangeDay)}
      />
      <p1>odGodz</p1>
      <Input
        type="text"
        name="timeFrom"
        placeholder="od godziny"
        min="12:00"
        max="22:30"
        onFocus={(e) => (e.target.type = "time")}
        onBlur={((e) => (e.target.type = "text"), onChangeTimeFrom)}
      />
      <p1>doGodz</p1>
      <Input
        type="text"
        name="timeTo"
        placeholder="do godziny"
        min="12:30"
        max="23:00"
        onFocus={(e) => (e.target.type = "time")}
        onBlur={((e) => (e.target.type = "text"), onChangeTimeTo)}
      />
      <div className="tableWrapper">
        {hiddenTables ? (
          <div>Podaj godzinę od i do</div>
        ) : (
          date &&
          Object.keys(test[date.date]).map((tableNr) => {
            let object = test[date.date][tableNr];
            return (
              <Table
                key={tableNr}
                name={tableNr}
                array={object}
                timeFrom={timeFrom.timeFrom}
                timeTo={timeTo.timeTo}
                day={date.date}
              >
                {tableNr}
              </Table>
            );
          })
        )}
      </div>
    </div>
  );
}

const mapStateToProps = () => {};

const mapDispatchToProps = (dispatch) => ({
  fetchTables: (date) => dispatch(fetchTablesAction(date)),
});

export default connect(mapStateToProps, mapDispatchToProps)(AppHook);
