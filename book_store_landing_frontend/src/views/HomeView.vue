<template>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Roboto+Condensed:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">

  <!-- Ad -->
  <div class="wrapper">
    <div class="register-holder">
      <h1 class="slogan">Сделайте книги вашим лучшим другом!</h1>
      <p class="description">Не упускайте возможность расширить свой литературный кругозор и окунуться в море приключений</p>
      <RouterLink to="/register"><button class="register-button">Зарегистрироваться</button></RouterLink>
    </div>
    <img class="bookshelf" src="../assets/bookshelf.png" alt="bookshelf">
  </div>

  <div class="slider-block">
    <p class="slider-title" id="popular">Книги, которые вас вдохновят</p>
    <div class="slider-holder">
      <img class="book" src="../assets/book.png" alt="book">
      <div class="book-text-holder">
        <p class="book-text-title" id="slider-title">{{ content[0][0] }}</p>
        <p class="book-text-author" id="slider-author">{{ content[0][1] }}</p>
        <p class="book-text" id="slider-desc">{{ content[0][2] }}</p>
        <div class="placeholder"><p class="book-text-name" id="slider-genre">{{ content[0][3] }}</p></div>
      </div>
      <img class="book-image" id="slider-image" :src="content[0][4]" alt="page">
    </div>
    <button class="left-arrow" @click="previousSlide()">&larr;</button>
    <button class="right-arrow" @click="nextSlide()">&rarr;</button>
  </div>

  <!-- Reviews -->
  <div class="wrapper-center" id="reviews">
    <p class="slider-title">Отзывы наших клиентов</p>
  </div>
  <div>
    <div class="wrapper-review">
      <div class="review-holder" v-for="(reviews, index) in firstThreeReviews" :key="index">
        <img class="avatar" :src="'src' + reviews.user_photo">
        <div class="name-holder"><p class="name">{{ reviews.user_name }}</p></div>
        <p class="review-text">{{ reviews.review_text }}</p>
      </div>
    </div>
    <div class="wrapper-review">
  <div class="review-holder" v-for="(reviews, index) in lastTwoReviews" :key="index" :class="index === 0 ? 'left-review' : ''">
    <img class="avatar" :src="'src' + reviews.user_photo">
    <div class="name-holder"><p class="name">{{ reviews.user_name }}</p></div>
    <p class="review-text">{{ reviews.review_text }}</p>
  </div>
</div>

  </div>

  <!-- Form -->
  <div class="wrapper-center">
    <p class="slider-title" id="send">Создайте свою индивидуальную рассылку!</p>
  </div>
  <div class="wrapper-center">
    <div class="form-holder">
      <div class="form-left">
        <p class="form-description">Выберите что вы хотите получать в вашей персональной email-рассылке:</p>
        <form class="form-box">
          <input type="checkbox" class="form-small-box" id="info" v-model="new_arrivals" value="1" >
          <label for="info">Информация о новых поступлениях</label><br>
          <input type="checkbox" class="form-small-box" id="books" v-model="selection_by_genre" value="1">
          <label for="books">Подборка по вашим избранным жанрам*</label><br>
          <input type="checkbox" class="form-small-box" id="articles" v-model="recommended_papers" value="1">
          <label for="articles">Статьи с рекомендациями от наших редакторов</label><br>
          <input type="checkbox" class="form-small-box" id="notifications" v-model="discount_notifications" value="1" checked>
          <label for="notifications">Уведомления о скидках</label>
          <p class="form-description">Как часто вы бы хотели получать рассылку?</p>
          <input type="radio" class="form-small-box" id="daily" v-model="frequency" value="Каждый день">
          <label for="daily">Каждый день</label><br>
          <input type="radio" class="form-small-box" id="weekly" v-model="frequency" value="Каждую неделю">
          <label for="weekly">Каждую неделю</label><br>
          <input type="radio" class="form-small-box" id="monthly" v-model="frequency" value="Каждый месяц">
          <label for="monthly">Каждый месяц</label>
        </form>
        <p class="form-small">* Выбор доступен в личном кабинете зарегистрированным пользователям</p>
      </div>
      <div class="form-right">
        <p class="form-description">Если есть вопрос, задайте его здесь:</p>
        <textarea placeholder="Ваш вопрос" v-model="question" rows="5" class="form-question"></textarea>
        <p class="form-description">Оставьте свою электронную почту и мы свяжемся с вами!</p>
        <input placeholder="example@mail.ru" type="email" v-model="email" class="form-mail">
        <button @click="addSubscriber" type="submit" class="form-send">Отправить</button>
      </div>
    </div>
  </div>

  <div v-show="invalidEmail" class="alert-warning">
    <p>Неправильный формат почты!</p>
  </div>

  <div v-show="subscriberCreated" class="alert-success">
    <p>Рассылка оформлена!</p>
  </div>

  <div v-show="registeredSub" class="alert-warning">
    <p>На эту почту уже оформлена рассылка!</p>
  </div>

  <div v-show="notEmptyMailing" class="alert-warning">
    <p>Нужно выбрать что будет в рассылке!</p>
  </div>

  <div v-show="notEmptyFrequency" class="alert-warning">
    <p>Не выбрана частота рассылки!</p>
  </div>

  <!-- Footer -->
  <footer>
    <div class="wrapper-review footer-holder">
      <div class="footer-holder1">
        <a class="router-logo" href="/"><img src="../assets/logo-footer.png" alt="logo"></a>
        <p class="rights-disc">2023/все права защищены</p>
      </div>
      
      <div class="footer-holder2">
        <div class="footer-holder3">
          <a class="router-text" href="../#popular">Популярное</a>
          <a class="router-text" href="../#reviews">Отзывы</a>
          <a class="router-text" href="../#send">Рассылка</a>
          <RouterLink class="router-text" to="/development">Каталог</RouterLink>
          <RouterLink class="router-text" to="/register">Регистрация</RouterLink>
          <RouterLink class="router-text" to="/login">Вход</RouterLink>
        </div>
        <div class="footer-holder4">
          <p class="router-text footer-text">Связаться с нами:</p>
          <RouterLink class="router-text" to="/nonexistent"><img src="../assets/vk.png"></RouterLink>
          <RouterLink class="router-text" to="/nonexistent"><img src="../assets/inst.png"></RouterLink>
          <RouterLink class="router-text" to="/nonexistent"><img src="../assets/tele.png"></RouterLink>
          <p class="router-text footer-text">8 (800) 555-35-35</p>
        </div>
      </div>
    </div>
  </footer>

</template>


<script setup>
import {nextSlide} from "../../slider";
import {previousSlide} from "../../slider";
import {content} from "../../slider";
</script>

<script>
import axios from 'axios';
import {getReviews} from "../../getReviews";

export default {
  data() {
    return {
      notEmptyFrequency: false,
      notEmptyMailing: false,
      registeredSub: false,
      subscriberCreated: false,
      invalidEmail: false,
      new_arrivals: null,
      selection_by_genre: null,
      recommended_papers: null,
      discount_notifications: null,
      frequency: null,
      question: null,
      email: null,
      reviews: [],
      firstThreeReviews: null,
      lastTwoReviews: null
    };
  },
  async mounted() {
    const { reviews, firstThreeReviews, lastTwoReviews } = await getReviews();
    this.reviews = reviews;
    this.firstThreeReviews = firstThreeReviews;
    this.lastTwoReviews = lastTwoReviews;
  },
  methods: {
    addSubscriber() {
      if (this.new_arrivals || this.selection_by_genre || this.recommended_papers || this.discount_notifications) {
        if (this.frequency){
          axios.get(`http://localhost:8080/api/subscribers?email=${this.email}`)
              .then((response) => {
                if (response.data.data.length > 0) {
                  this.registeredSub = true;
                  setTimeout(() => {
                    this.registeredSub = false;
                  }, 3000);
                } else {
                  axios.post('http://localhost:8080/api/subscribers', {
                    email: this.email,
                    new_arrivals: this.new_arrivals,
                    selection_by_genre: this.selection_by_genre,
                    recommended_papers: this.recommended_papers,
                    discount_notifications: this.discount_notifications,
                    frequency: this.frequency,
                    question: this.question,
                  })
                      .then(response => {
                        this.subscriberCreated  = true;
                        setTimeout(() => {
                          this.subscriberCreated = false;
                        }, 3000);
                      })
                      .catch(error => {
                        if (error.response.status === 422 && error.response.data.errors.email) {
                          this.invalidEmail = true;
                          setTimeout(() => {
                            this.invalidEmail = false;
                          }, 3000);
                        }
                      });
                }
              });
        }else {
          this.notEmptyFrequency = true;
          setTimeout(() => {
            this.notEmptyFrequency = false;
          }, 3000);
        }
      } else {
        this.notEmptyMailing = true;
        setTimeout(() => {
          this.notEmptyMailing = false;
        }, 3000);
      }
    },
  }
};
</script>

<style scoped>

.alert-warning {
  width: 1140px;
  display: flex;
  justify-content: center;
  margin:auto;
  padding: 15px;
  color: #856404;
  background-color: #ffca80;
  border: 1px solid #d0c297;
  border-radius: 4px;
}

.alert-warning .icon {
  margin-right: 10px;
  font-size: 20px;
}

.alert-warning .message {
  font-size: 16px;
}

.alert-success {
  width: 1140px;
  display: flex;
  justify-content: center;
  margin:auto;
  padding: 15px;
  color: #155724;
  background-color: #d4edda;
  border: 1px solid #c3e6cb;
  border-radius: 4px;
}

.alert-success .icon {
  margin-right: 10px;
  font-size: 20px;
}

.alert-success .message {
  font-size: 16px;
}

.wrapper {
  width: 1140px;
  display: flex;
  justify-content: space-between;
  margin:auto;
}
.wrapper-center {
  width: 1140px;
  display: flex;
  justify-content: center;
  margin:auto;
}

.wrapper-review {
  width: 1140px;
  display: flex;
  justify-content: space-evenly;
  flex-wrap: wrap;
  margin:auto;
  margin-bottom: 38px;
}

.slogan {
  font-family: 'SONGER-grotesque';
  font-weight: 500;
  font-size: 80px;
  margin-bottom: 30px;
  line-height: 96px;
  color: #5B3E3E;
}

.description {
  font-family: 'Roboto Condensed';
  font-weight: 400;
  font-size: 24px;
  margin-bottom: 30px;
  color: #5B3E3E;
}

.register-button {
  border-radius: 20px;
  width: 240px;
  height: 67px;
  border: none;
  background-color: #DD5A31;
  font-family: 'Roboto Condensed';
  font-weight: 500;
  font-size: 24px;
  color: #FFEFD0;
  cursor: pointer;
}
.register-holder {
  width: 565px;
  margin-top: 80px;
  margin-bottom: 250px;
}

.bookshelf {
  position: absolute;
  margin-top: 80px;
  margin-left: 422px;
}

.slider-block {
  margin: 0px;
  padding: 0px;
  width: 1140px;
  margin: auto;
  margin-bottom: 50px;
  text-align: center;
}

.slider-title {
  font-family: 'Roboto Condensed';
  font-size: 40px;
  font-weight: 500;
  line-height: 47px;
  color: #5B3E3E;
  margin-bottom: 70px;
  margin-top: 60px;
}

.slider-holder {
  width: 1140px;
  margin: 0px;
  display: flex;
  justify-content: center;
}

.book {
  margin-top: -40px;
}

.book-text-title {
  font-size: 32px;
  color: black;
  margin-bottom: 0px;
  padding-bottom: 0px;
  font-weight: 500;
  line-height: 38px;
  width: 340px;
  font-family: 'Roboto Condensed';
  text-align: left;
  margin-top: -40px;
}

.book-text-author {
  font-size: 14px;
  color: black;
  font-weight: 400;
  font-family: 'Roboto Condensed';
  text-align: left;
}

.book-text {
  font-size: 16px;
  color: black;
  margin-top: 30px;
  margin-bottom: 30px;
  width: 359px;
  font-weight: 400;
  font-family: 'Roboto Condensed';
  text-align: left;
}

.book-text-name {
  font-weight: 400;
  font-size: 13px;
  font-family: Inter;
  height: 30px;
  padding-left: 10px;
  padding-right: 10px;
  align-self: left;
  display: inline-block;
  color: black;
  background-color: #FFE0BD;
  line-height: 30px;
  justify-self: left;
  text-align: left;
  border-radius: 7px;
}

.book-text-holder {
  position: absolute;
  margin-right: 500px;
  margin-top: 125px;
}

.book-image {
  width: 359px;
  height: 549px;
  position: absolute;
  margin-left: 500px;
  margin-top: 80px;
}

.placeholder {
  display:flex;
  justify-content: left;
}

.right-arrow {
  position: absolute;
  text-decoration: none;
  font-size: 46px;
  line-height: 40px;
  color: #FFEFD0;
  background-color: #DC2E2E;
  border: none;
  margin: 0px;
  padding: 0px;
  margin-left: 517px;
  margin-top: -424px;
  cursor: pointer;
}

.left-arrow {
  position: absolute;
  text-decoration: none;
  font-size: 46px;
  line-height: 40px;
  color: #FFEFD0;
  background-color: #DC2E2E;
  border: none;
  margin: 0px;
  padding: 0px;
  margin-left: -560px;
  margin-top: -424px;
  cursor: pointer;
}

.review-holder {
  width: 318px;
  height: 275px;
  border-radius: 20px;
  background: #FFF8EB;
  color: black;
  box-shadow: 0px 0px 20px 0px #80453D21;
  vertical-align: middle;
}

.left-review {
  margin-right: -180px;
}

.avatar {
  margin-left: 33px;
  margin-top: 27px;
  margin-bottom: 10px;
  display: inline-block;
}

.name-holder {
  display: inline-block;
  vertical-align: 25px;
}

.name {
  font-family: 'Roboto Condensed';
  font-size: 20px;
  font-weight: 400;
  line-height: 23px;
  margin-left: 15px;
  text-align: left;
}

.review-text {
  font-family: 'Roboto Condensed';
  font-size: 16px;
  font-weight: 400;
  line-height: 19px;
  text-align: left;
  margin-left: 33px;
  width: 250px;
}

.form-holder {
  display: flex;
  justify-content: space-between;
  background: #FFF8EB;
  border-radius: 20px;
  box-shadow: 0px 4px 20px 0px #80453D21;
  margin-bottom: 60px;
}

.form-description {
  width: 382px;
  font-family: 'Roboto Condensed';
  font-size: 20px;
  font-weight: 400;
  line-height: 23px;
  text-align: left;
  margin-top: 46px;
  margin-left: 68px;
}

.form-box {
  font-family: 'Roboto Condensed';
  font-size: 16px;
  font-weight: 400;
  line-height: 19px;
  text-align: left;
}

input[type=checkbox] {
  accent-color: #DD5A31;
  
}



.form-small {
  font-family: 'Roboto Condensed';
  font-size: 11px;
  font-weight: 400;
  line-height: 13px;
  text-align: left;
  margin-top: 26px;
  margin-left: 68px;
  margin-bottom: 30px;
}

.form-send {
  border-radius: 10px;
  width: 109px;
  height: 44px;
  border: none;
  background-color: #993e22;
  font-family: 'Roboto Condensed';
  font-weight: 500;
  font-size: 16px;
  margin-top: 25px;
  margin-right: 68px;
  color: #FFF8EB;
  cursor: pointer;
  display: block;
  margin-left:auto;
}

.form-question {
  width: 358px;
  height: 125px;
  margin-left: 68px;
  margin-top: 20px;
  margin-right: 68px;
  resize: none;
  outline: none;
  border: none;
  padding-right: 10px;
  padding-top: 5px;
  border-radius: 7px;
}

.form-mail {
  width: 358px;
  height: 27px;
  margin-left: 68px;
  margin-top: 20px;
  margin-right: 68px;
  resize: none;
  outline: none;
  border: none;
  border-radius: 7px;
  padding-top: 4px;
}

.form-small-box {
  margin-left: 45px;
  margin-top: 15px;
  margin-right: 10px;
  z-index: -1;
  opacity: 0;
}

.form-round-box {
  margin-left: 45px;
  margin-top: 15px;
  margin-right: 10px;
  z-index: -1;
  opacity: 0;
}

.form-small-box+label {
  display: inline-flex;
  align-items: center;
  user-select: none;
}
.form-small-box+label::before {
  content: '';
  display: inline-block;
  width: 12px;
  height: 13px;
  flex-shrink: 0;
  flex-grow: 0;
  border: 1px solid black;
  border-radius: 4px;
  margin-right: 0.5em;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
  cursor: pointer;
}

.form-round-box+label {
  display: inline-flex;
  align-items: center;
  user-select: none;
}
.form-round-box+label::before {
  content: '';
  display: inline-block;
  width: 11px;
  height: 11px;
  flex-shrink: 0;
  flex-grow: 0;
  border: 1px solid black;
  border-radius: 8px;
  margin-right: 0.5em;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
  cursor: pointer;
}

.form-small-box:checked+label::before {
  background-color: #DD5A31;
}

.form-round-box:checked+label::before {
  background-color: #DD5A31;
}

textarea {
  padding-left: 15px;
  font-family: 'Roboto Condensed';
  font-size: 16px;
}

.router-logo {
  margin: 0px;
  margin-top: 42px;
  padding: 0px;
  text-decoration: none;
}

footer {
  margin-top: 60px;
  background: #993e22;
}

.router-text{
  color: #FFEFD0;
  margin-top: 20px;
  font-size: 16px;
  font-family: 'Roboto Condensed';
  text-decoration: none;
}

.footer-holder {
  margin-bottom: 0px;
  align-items: center;
}

.footer-holder2 {
  width: 620px;
  display: inline-block;
  align-items: center;
}

.footer-holder3 {
  padding-bottom: 0px;
  padding-top: 40px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.footer-holder4 {
  padding-bottom: 60px;
  margin-top: 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.rights-disc {
  font-family: 'Inter';
  color: #FFEFD0;
  font-size: 11px;
  font-weight: 400;
  line-height: 13px;
  text-align: left;
  padding-right: 30px;
}

.footer-text {
  margin-top: 0px;
}

.footer-holder1 {
  display: inline-block;
}

</style>