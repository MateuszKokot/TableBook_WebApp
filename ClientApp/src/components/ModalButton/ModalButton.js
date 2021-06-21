import React from "react";
import styles from "./ModalButton.module.scss";

const ModalButton = ({ ...props }) => {
  return (
    <React.Fragment>
      <button {...props} className={styles.hamburger}>
        <span className={styles.hamburger__box}>
          <span className={styles.hamburger__inner}></span>
        </span>
      </button>
    </React.Fragment>
  );
};

export default ModalButton;
