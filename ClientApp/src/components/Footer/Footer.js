import React from "react";
import styles from "./Footer.module.scss";

const Footer = () => {
  return (
    <div className={styles.wrapper}>
      <div className={styles.container}>
        <div className={styles.row}>
          {/*column1*/}
          <div className={styles.col}>
            <a className={styles.link} href="https://szulinek.pl">
              <h4 className={styles.header}>TableBook inc.</h4>
            </a>
            <ul className={styles.list}>
              <li>736 082 373</li>
              <li>Poznań, Poland</li>
            </ul>
          </div>
          {/*column2*/}
          <div className={styles.col}>
            <a className={styles.link}>
              <h4 className={styles.header}>CEO's</h4>
            </a>

            <ul className={styles.list}>
              <li>Adam Hałdaś</li>
              <li>Mateusz Kokot</li>
              <li>Michał Kolanowski</li>
              <li>Michał Sowiński</li>
            </ul>
          </div>
          {/*column3*/}
          <div className={styles.col}>
            <a className={styles.link}>
              <h4 className={styles.header}>Programowanie </h4>
            </a>
            <ul className={styles.list}>
              <li>aplikacji</li>
              <li>webowych</li>
              <li>Projekt</li>
              <li>k.32.2</li>
            </ul>
          </div>
        </div>
        <hr />
        <div className={styles.rowSecond}>
          <p>
            &copy;{new Date().getFullYear()} TABLEBOOK INC | All right reserved
            | Terms of Service | Privacy Policy
          </p>
        </div>
      </div>
    </div>
  );
};

export default Footer;
