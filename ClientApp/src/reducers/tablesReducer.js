const tablesReducer = (state = "", action) => {
  switch (action.type) {
    case "FETCHTABLES":
      return {
        ...state,
      };
    default:
      return state;
  }
};

export default tablesReducer;
