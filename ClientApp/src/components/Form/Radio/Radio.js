import React from "react";
import styles from "./../Radio/Radio.module.scss";

const Radio = ({ id, checked, changeFn, children }) => {
  return (
    <label className={styles.radio}>
      <input id={id} type="radio" onChange={changeFn} checked={checked} />
      <div className={styles.radioButton}></div>
      {children}
    </label>
  );
};

export default Radio;
