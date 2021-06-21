import React from "react";
import ListItem from "./ListItem";
import styles from "./List.module.scss";

const List = ({ items }) => (
  <>
    {items.length ? (
      <ul className={styles.wrapper}>
        {items.map((item) => (
          <ListItem key={item.imie} {...item} />
        ))}
      </ul>
    ) : (
      <h1 className={styles.noItems}>
        Zarezerwuj stolik lub zostaw opinie o restauracji.
        <br />
        <br />
        kliknij dodaj
      </h1>
    )}
  </>
);

export default List;
