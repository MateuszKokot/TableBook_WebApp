import React from "react";
import Button from "../Button/Button";
import HeaderNavigation from "./HeaderNavigation";
import styles from "./Header.module.scss";
import logoImage from "../../assets/images/logo.svg";

const Header = ({ closeModalFn }) => (
  <header className={styles.wrapper}>
    <img className={styles.logo} src={logoImage} alt="FavNote logo" />
    <HeaderNavigation />
    <Button onClick={closeModalFn} secondary>
      dodaj
    </Button>
  </header>
);

export default Header;
