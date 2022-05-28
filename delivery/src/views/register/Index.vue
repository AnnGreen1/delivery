<template>
  <div class="above-container">
    <div class="fill"></div>
    <div class="container">
      <van-form class="form">
        <van-cell-group inset>
          <van-field v-model="username" name="username" label="邮箱" placeholder="邮箱" />
          <van-field v-model="password" type="password" name="password" label="密码" placeholder="密码" />
          <van-field v-model="nickname" name="username" label="昵称" placeholder="昵称" />
          <van-field v-model="payword" name="username" label="支付密码" placeholder="支付密码" />
          <van-field v-model="verificationcode" center clearable label="邮箱验证码" placeholder="请输入验证码" >
            <template #button>
              <van-button
                size="mini"
                type="primary"
                @click="getVerificationCode"
                >{{ content }}</van-button
              >
            </template>
          </van-field>
        </van-cell-group>
        <div style="margin: 16px">
          <van-button round block type="primary" native-type="submit" @click="onsubmit">
            注册
          </van-button>
        </div>
      </van-form>
    </div>
  </div>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
export default {
  data() {
    return {
      logo: require("@/assets/logo.png"),
      username: "",
      password: "",
      nickname:"",
      payword:"",
      time: "发送验证码",
      totalTime: 60,
      content: '发送验证码',
      verificationcode:'',
    };
  },
  methods: {
    countDown() {
      let clock = window.setInterval(() => {
        this.totalTime--
        this.content = this.totalTime + 's后重新发送'
      }, 1000)
    },
    getVerificationCode() {
      console.log('获取验证码');
      console.log(this.username);
      this.countDown();
      this.time = 60;
      this.$axios({
        methods: "post",
        url: globalConfig.base_url+`/deliveryServer/sendverificationcode.php?username=${this.username}`,
      }).then((res) => {
        console.log(res);
      })
    },
    onsubmit() {
        console.log("执行了");
    //   console.log(values);
    console.log(this.username);
    console.log(this.password);
    console.log(this.nickname);
    console.log(this.payword);
    console.log(this.verificationcode);
    this.$axios({
        methods: "post",
        url: globalConfig.base_url+`/deliveryServer/register.php?email=${this.username}&password=${this.password}&nickname=${this.nickname}&payword=${this.payword}&verificationcode=${this.verificationcode}`,
      }).then((res) => {
        console.log(res);
      })
    }
  },
}
</script>


<style lang="scss" scoped>
.above-container {
  background-color: rgb(255, 204, 51);
  //background-image: url('@/assets/imgs/login/login-background-image.png');
  // background-repeat: repeat-y;
  height: 843px;
  // width:300px;
  // margin-top:0px;
  // float:none;
  margin-bottom: 0px;
  .fill {
    height: 200px;
    width: 100%;
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
  }
}
</style>