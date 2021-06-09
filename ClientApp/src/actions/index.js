import axios from "axios";
export const setCurrentTable = (table) => {
  return {
    type: "CURRENTTABLE",
    payload: table,
  };
};
export const fetchTablesAction = (date) => (dispatch) => {
  dispatch({ type: "FETCHTABLES" });

  return axios
    .get(
      `http://maco0.pl/bookings/getOneDayBookings/idRestaurant/1/bookingDate/${date}`
    )
    .then(({ data }) => {
      console.log(data);
    });
};
