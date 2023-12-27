<template>
  <div class="wrapper">
      <img src="../assets/bookshelf2.png" alt="ddd">
      <img class="workmf" src="../assets/work.png" alt="ddd">
      <RouterLink to="/" class="ass">Вернуться на главную</RouterLink>
  </div>
</template>
  
  <style scoped>

.wrapper {
  width: 1140px;
  margin:auto;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
}

.ass {
  font-family: 'Roboto Condensed';
  font-size: 16px;
  font-weight: 500;
  line-height: 19px;
  color: white;
  text-align: center;
  position:absolute;
  margin-top: 130px;
}

.workmf {
  position: absolute;
  margin-top: -80px;
}
  </style>