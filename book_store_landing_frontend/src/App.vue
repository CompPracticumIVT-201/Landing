<template>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet"> 
  <header>
    <div class="wrapper">
      <nav>
        <div class="logo-holder">
          <RouterLink class="router-logo" to="/"><img src="/src/assets/log.png" alt="logo"></RouterLink>
        </div>
        <a class="router-text" href="../#popular">Популярное</a>
        <a class="router-text" href="../#reviews">Отзывы</a>
        <a class="router-text" href="../#send">Рассылка</a>
        <RouterLink class="router-register" to="/register">Регистрация</RouterLink>
        <RouterLink class="router-login" to="/login">Вход</RouterLink>
      </nav>
    </div>
  </header>
  <RouterView />
</template>

<style scoped>

nav {
  width: 100%;
  font-size: 22px;
  width: 1140px;
  text-align: center;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 20px;
  margin-bottom: 20px;
}

.logo-holder {
  width: 570px;
  display: flex;
  justify-content: left;
}

header .wrapper {
  display: flex;
  justify-content: space-around;
}

.router-logo {
  margin: 0px;
  padding: 0px;
  text-decoration: none;
}

.router-text{
  color: #351F1F;
  font-size: 16px;
  text-decoration: none;
  font-family: 'Roboto Condensed';
  font-weight: 400;
}

.router-register {
  text-decoration: none;
  color: #FFEFD0;
  background-color: #DD5A31;
  font-size: 16px;
  width: 102px;
  line-height: 36px;
  border-radius: 12px;
  text-align: center;
  height: 36px;
  margin-right: -38px;

  font-family: 'Roboto Condensed';
  font-weight: 500;
}

.router-login {
  text-decoration: none;
  color: #DD5A31;
  font-size: 16px;
  width: 46px;
  line-height: 36px;
  border-radius: 12px;
  border: 2px solid #DD5A31;
  text-align: center;
  font-family: 'Roboto Condensed';
  font-weight: 500;
}

.router-link-active {
  color: #020201;
  font-weight: 2000;
}

</style>

