<template>
<div class="above-container">
<div class="fill"></div>
  <div class="container">
    <van-image class="logo" width="120" height="120" :src="logo" />
    <van-form class="form" @submit="onSubmit">
      <van-cell-group inset>
        <van-field
          v-model="loginInfo.username"
          name="username"
          label="用户名"
          placeholder="用户名"
        />
        <van-field
          v-model="loginInfo.password"
          type="password"
          name="password"
          label="密码"
          placeholder="密码"
        />
      </van-cell-group>
      <div style="margin: 16px">
        <van-button round block type="primary" native-type="submit">
          登录
        </van-button>
      </div>
    </van-form>
    <p @click="$router.push({ path: 'register' })">没有账户？立即注册</p>
  </div>
</div>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
import Qs from "qs";
import { Toast } from "vant";
import { mapMutations } from 'vuex';
// import { Toast } from "vant";
export default {
  data() {
    return {
      logo: require("@/assets/logo.png"),
      loginInfo: {
        username: "",
        password: ""
      }
    };
  },
  methods: {
    ...mapMutations("user", ["saveUserInfo"]),
    onSubmit(values) {
      console.log(values);
      // console.log(Qs.stringify(values));
      this.$axios({
        methods:"post",
        url:globalConfig.base_url+`/deliveryServer/login.php?username=${values.username}&password=${values.password}`,
        // data: Qs.stringify(values),
      }) .then((res) => {
        console.log(res);
        console.log(res.username);
          // console.log(res.result.userInfo);
          // this.saveUserInfo(res.result.username);
          sessionStorage.setItem("username", res.username);
          
          // sessionStorage.setItem("password", res.password);
          console.log(sessionStorage.getItem('username'));
          this.$router.push("/home");
        }).catch((error) => {
          console.log(error);
          Toast.fail("登录失败！");
        });
    },
    getUsericon(){
      // console.log(e);
console.log("失去焦点");
    },
  },
};
</script>

<style lang="scss" scoped>
.above-container{
  background-color: rgb(255, 204, 51);
  //background-image: url('@/assets/imgs/login/login-background-image.png');
  // background-repeat: repeat-y;
  height:843px;
  // width:300px;
  // margin-top:0px;
  // float:none;
  margin-bottom: 0px;
  .fill{
    height:200px;
    width:100%;
     background-color: rgb(255, 204, 51);
  }
.container {
    background-color: rgb(255, 204, 51);
  //margin-top: 200px;
  padding: 0px 30px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transform: translateY(-50px);
  .logo {
    margin-bottom: 30px;
    img {
      border-radius: 60px;
    }

    // box-shadow: rgba(60, 57, 57, 0.902) 0px 3px 7px;
  }
  .form {
    top: 200px;
  }
  p{
    border-bottom-style: solid;
    border-width:1px;
  }
}
}

</style>