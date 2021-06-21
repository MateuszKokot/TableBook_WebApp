import React from "react";
import { NavLink } from "react-router-dom";
import styles from "./HeaderNavigation.module.scss";

const HeaderNavigation = () => (
  <nav>
    <ul className={styles.wrapper}>
      <li className={styles.navItem}>
        <NavLink
          exact
          activeClassName={styles.navItemLinkActive}
          className={styles.navItemLink}
          to="/"
        >
          TableBook
        </NavLink>
      </li>
      <li className={styles.navItem}>
        <NavLink
          activeClassName={styles.navItemLinkActive}
          className={styles.navItemLink}
          to="/rezerwacje"
        >
          rezerwacje
        </NavLink>
      </li>
      <li className={styles.navItem}>
        <NavLink
          activeClassName={styles.navItemLinkActive}
          className={styles.navItemLink}
          to="/opinie"
        >
          opinie
        </NavLink>
      </li>

      <li className={styles.navItem}>
        <NavLink
          activeClassName={styles.navItemLinkActive}
          className={styles.navItemLink}
          to="/kontakt"
        >
          kontakt
        </NavLink>
      </li>
      <li className={styles.navItem}>
        <NavLink
          activeClassName={styles.navItemLinkActive}
          className={styles.navItemLink}
          to="/politykaprywatnosci"
        >
          polityka prywatności
        </NavLink>
      </li>
    </ul>
  </nav>
);

export default HeaderNavigation;
