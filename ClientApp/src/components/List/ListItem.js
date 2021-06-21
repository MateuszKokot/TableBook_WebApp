import React from "react";
import PropTypes from "prop-types";
import styles from "./ListItem.module.scss";
import Button from "../Button/Button";
import Title from "../Title/Title";

const ListItem = ({ imie, ileOsob, data, tekst }) => {
  return (
    <li className={styles.wrapper}>
      <Title>{imie}</Title>
      {ileOsob ? <p>liczba osób: {ileOsob}</p> : null}
      {data ? <p>data: {data}</p> : null}
      <p>tekst: {tekst}</p>
    </li>
  );
};

ListItem.propTypes = {
  imie: PropTypes.string.isRequired,
  tekst: PropTypes.string.isRequired,
  data: PropTypes.string,
  ileOsob: PropTypes.string,
};

ListItem.defaultProps = {
  imie: null,
  tekst: null,
  ileOsob: null,
  data: null,
};

export default ListItem;
