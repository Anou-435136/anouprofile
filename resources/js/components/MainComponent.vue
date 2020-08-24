<template>
    <main>
      <div id="top-content">
        <div class="top-title">
          <h1>Anou home page</h1>
        </div>
        <p>Programming learning for general high school students</p>
      </div>

      <div id="profile-content">
        <div class="profile">
          <h2 class="section-title">my profile</h2>
          <div class="profile-content-img">
            <img src="/img/2020-08-15 (2).png" alt="">
            <button class="profile-button" @click="openMyprofile">Anou</button>
          </div>
          <p>※名前をクリックでprofile詳細</p>
          <div class="overlay1" v-if="show1">
            <div class="myprofile-wrapper">
              <div class="myprofile">
                <h2>my profile</h2>
                <h3>趣味</h3>
                <p></p>
                <h3>特技</h3>
                <p></p>
                <h3>長所</h3>
                <p></p>
                <button @click="closeMyprofile">閉じる</button>
              </div>
            </div>
          </div>

        </div>

        <div class="profile">
          <div class="sub-profile-content1">
            <h3>学んでいる言語</h3>
            <ul>
              <li><p></p></li>
              <li><p></p></li>
              <li><p></p></li>
            </ul>
            <h4>＜ポートフォリオ＞</h4>
            <div class="portfolio flex around">
              <p><a href="https://anouweather.netlify.app" target="_blank">Weather App</a></p>
              <p><a href="https://anoupost.netlify.app" target="_blank">Post App</a></p>
              <p><a href="https://anoutodolist.netlify.app" target="_blank">Todo App</a></p>
            </div>
          </div>
          <img class="profile-content-img1" src="/img/kisspng-cascading-style-sheets-javascript-html-css3-jquery-logo-5ac78cfa336221.4490363115230271942105.png" alt="">
        </div>

        <div class="profile">
          <div class="sub-profile-content2">
            <h3>なにかtitle</h3>
            <p>何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。何か書く。</p>
          </div>  
          <img class="profile-content-img2" src="/img/ales-nesetril-Im7lZjxeLhg-unsplash.jpg" alt="">
        </div>

      </div>          
        

      <div id="question-content">
        <form v-if="!emailSent">
          <h2 class="section-title">question content</h2>
          <div class="user-information">
            <label>name
              <input type="text" v-model="name">
              <div class="error_txt" v-html="errors.name"></div>
            </label>
            <label>e-mail
              <input type="text" v-model="email">
              <div class="error_txt" v-html="errors.email"></div>
            </label>
          </div>
          <label>question
            <textarea cols="30" rows="10" placeholder="質問を記入してください" v-model="question"></textarea>
            <div class="error_txt" v-html="errors.question"></div>
          </label>
          <button @click="onSubmit()">button</button>
        </form>
        <div v-if="emailSent">送信されました。</div>
      </div>
    </main>
  
</template>

<script>
export default {
  data() {
    return {
      show1: false,
      name: '',
      email: '',
      question: '',
      errors: {},
      emailSent: false
    };
  },
  methods: {
    openMyprofile() {
      this.show1 = true;
    },
    closeMyprofile() {
      this.show1 = false;
    },
    onSubmit() {
      if (!confirm('送信しますか？')) {
        return;
      }
      var params = {
        name: this.name,
        email: this.email,
        question: this.question
      };

      var self = this;

      this.errors = {};

      axios.post('/contact', params).then(function(response) {
        self.emailSent = true;
      })
      .catch(function(error) {
        var errors = {};
        for(var key in error.response.data.errors) {
          errors[key] = error.response.data.errors[key].join('<br>');
        }

        self.errors = errors;
      });
    }
  }  
}
</script>

<style>

#top-content {
  height: 830px;
  color: white;
  background-image: url(/img/emile-perron-xrVDYZRGdw4-unsplash.jpg);
  background-size: cover;
  position: relative;
}
.top-title {
  font-size: 55px;
  position: absolute;
  top: 270px;
  left: 60px;
}
#top-content p {
  font-size: 30px;
  position: absolute;
  top: 350px;
  left: 60px;
}

#profile-content {
  height: 1850px;
  border-top: 1px solid black;
  background:linear-gradient(125deg, #ddd 30%, white 20%, white 40%, white 40%, white 75%, black 30%, black 80%, white 80%);
  position: relative;
}
.profile-content-img {
  width: 300px;
  height: 300px;
  margin: 50px auto 0;
  box-shadow: 2px 2px 2px;
  position: relative;
}
.profile-button {
  width: 302px;
  font-size: 40px;
  padding: 7px 0;
  border: none;
  border-radius: 3px;
  color: white;
  background: black;
  position: absolute;
  top: 315px;
  left: 0;
}
.profile > p {
  text-align: center;
  margin-top: 80px;
}
.overlay1 {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.3);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 3;
}
.myprofile-wrapper {
  width: 40%;
  height: 60%;
  background: white;
  border-radius: 10px;
  z-index: 4;
}
.myprofile {
  margin: 50px;
  text-align: center;
}
.myprofile h2 {
  font-size: 30px;
}
.myprofile h3 {
  font-size: 20px;
  margin: 50px 0 70px 0;
  text-align: left;
}
.myprofile button {
  margin-top: 30px;
  padding: 5px 25px;
  border-radius: 3px;
  background: white;
}
.myprofile button:hover {
  color: white;
  background: black;
  transition: 0.5s;
}
.profile-button:hover {
  cursor: pointer;
}
.sub-profile-content-img {
  width: 500px;
}
.profile-content-img1 {
  width: 500px;
  height: auto;
  border: 2px solid black;
  padding: 130px ;
  z-index: 1;
  position: absolute;
  top: 600px;
  right: 50px;
}
.profile-content-img2 {
  width: 730px;
  height: auto;
  box-shadow: 5px 5px 5px 5px #ddd;
  z-index: 1;
  position: absolute;
  bottom: 150px;
  left: 50px;
}
.sub-profile-content1 {
  width: 40%;
  height: 350px;
  background: white;
  border: 1px solid black;
  z-index: 2;
  position: absolute;
  top: 670px;
  left: 380px;
}
.sub-profile-content1 h3 {
  font-size: 20px;
  margin: 45px 0 0 50px;
}
.sub-profile-content1 h4 {
  margin: 0 0 20px 40px;
}
.sub-profile-content1 ul {
  line-height: 35px;
  margin: 15px 0 0 70px;
}
/* sub-profile-contentのbutton */
.portfolio p {
  width: 110px;
  text-align: center;
  font-weight: bold;
  padding: 10px 20px;
  background: rgb(66, 66, 66);
  border-radius: 3px;
}
.portfolio a {
  color: white;
  text-decoration: none;
}
.portfolio p:hover {
  background: rgb(110, 110, 110);
}
#profile-content small {
  font-size: 12px;
  margin-left: 540px;
}
.sub-profile-content2 {
  width: 40%;
  height: 350px;
  border: 1px solid black;
  background: white;
  z-index: 2;
  position: absolute;
  bottom: 200px;
  right: 430px;
}
.sub-profile-content2 h3 {
  font-size: 20px;
  margin: 45px 0 0 50px;
}
.sub-profile-content2 p {
  margin: 40px 50px;
  line-height: 30px;
  letter-spacing: 1px;
}

#question-content {
  height: 800px;
  border: 1px solid black;
  background:linear-gradient(125deg, #ddd 30%, white 20%, white 40%, white 40%, white 75%, black 30%, black 80%, white 80%);
}
form {
  width: 60%;
  height: 650px;
  margin: 60px auto;
  border: 3px dotted black;
  text-align: center;
}
.user-information {
  margin-top: 50px;
}
label {
  font-size: 19px;
  font-weight: bold;
  display: block;
  margin: 30px auto;
}
input, textarea {
  width: 500px;
  display: block;
  margin: 10px auto;
  padding: 10px;
}
form button {
  font-size: 19px;
  font-weight: bold;
  margin-top: 10px;
  padding: 10px 30px;
  background: white;
  border-radius: 3px;
  cursor: pointer;
}
form button:hover {
  color: white;
  background: black;
  transition: 0.6s;
}
</style>