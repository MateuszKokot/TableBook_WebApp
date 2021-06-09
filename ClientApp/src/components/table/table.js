import React from "react";
import { connect } from "react-redux";
import { setCurrentTable } from "../../actions";

const Table = (
  { children, array, name, timeFrom, timeTo, day, state, setTable },
  ...props
) => {
  const tFromInput = new Date(timeFrom);
  const tToInput = new Date(timeTo);
  const timeCheck = array.find(({ fromHour, toHour }) => {
    const tFrom = new Date(`${day} ${fromHour}`);
    const tTo = new Date(`${day} ${toHour}`);
    if (tToInput.getTime() - tFromInput.getTime() < 3600000) {
      console.log("rezerwacja na minium 1h");
      return true;
    } else if (
      tToInput.getTime() > tFrom.getTime() &&
      tToInput.getTime() < tTo.getTime()
    ) {
      console.log("zajęte 1");
      return true;
    } else if (
      tFromInput.getTime() > tFrom.getTime() - 3600000 &&
      tFromInput.getTime() < tTo.getTime()
    ) {
      console.log("zajęte 2");
      return true;
    } else if (
      tFromInput.getTime() < tFrom.getTime() &&
      tToInput.getTime() > tFrom.getTime()
    ) {
      console.log("zajęte 3");
      return true;
    } else {
      return false;
    }
  });

  const setCurrentTableClick = (e) => {
    if (document.querySelector(".tableClicked")) {
      document.querySelector(".tableClicked").classList.remove("tableClicked");
    }
    setTable(e.target.textContent);
    e.target.classList.add("tableClicked");
  };

  return (
    <>
      <div
        className={timeCheck ? "tableReserved" : "table"}
        onClick={!timeCheck ? (e) => setCurrentTableClick(e) : undefined}
      >
        {children}
      </div>
      {console.log(array, name, timeFrom, timeTo)}
    </>
  );
};

const mapStateToProps = (state) => {
  return { state };
};

const mapDispatchToProps = (dispatch) => ({
  setTable: (table) => dispatch(setCurrentTable(table)),
});

export default connect(mapStateToProps, mapDispatchToProps)(Table);
