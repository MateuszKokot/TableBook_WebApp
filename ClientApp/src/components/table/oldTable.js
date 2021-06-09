{
  array.map(({ fromHour, toHour }) => {
    const tFrom = new Date(`${day} ${fromHour}`);
    const tTo = new Date(`${day} ${toHour}`);
    if (tToInput.getTime() - tFromInput.getTime() < 3600000) {
      return (
        <div className="tableReserved">
          {children} {console.log("chuj1")}
        </div>
      );
    } else if (
      tToInput.getTime() > tFrom.getTime() &&
      tToInput.getTime() < tTo.getTime()
    ) {
      return (
        <div className="tableReserved">
          {children}
          {console.log("chuj2")}
        </div>
      );
    } else if (
      tFromInput.getTime() > tFrom.getTime() - 3600000 &&
      tFromInput.getTime() < tTo.getTime()
    ) {
      return (
        <div className="tableReserved">
          {children}
          {console.log("chuj3")}
        </div>
      );
    } else if (
      tFromInput.getTime() < tFrom.getTime() &&
      tToInput.getTime() > tFrom.getTime()
    ) {
      return (
        <div className="tableReserved">
          {children}
          {console.log("chuj4")}
        </div>
      );
    } else {
      return (
        <div className="table">
          {children}
          {console.log("ok")}
        </div>
      );
    }
  });
}
