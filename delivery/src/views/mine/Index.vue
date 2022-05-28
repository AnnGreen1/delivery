<template>
  <div class="container">
    <div class="user-info">
      <img width="100" height="100" :src="'/static/imgs/mine/'+icon" />
      <div v-if="username">{{username}}</div>
    </div>
    <van-cell-group>
      <van-cell icon="shield-o" title="登录密码" is-link @click="$router.push({path:'/mine/password'})" />
      <van-cell icon="location-o" title="修改地址" is-link @click="$router.push({ path: '/mine/address'})" />
      <van-cell icon="smile-o" title="修改头像" is-link @click="$router.push({path:'/mine/icon'})" />
      <van-cell icon="closed-eye" title="支付密码" is-link @click="$router.push({ path:'/mine/payword'})" />
      <van-cell icon="gold-coin-o" title="我的财富" is-link @click="$router.push({ path:'/mine/balance'})" />
      <van-cell icon="revoke" title="退出登录" is-link to="/login" />
    </van-cell-group>
  </div>
  <tab-bar></tab-bar>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
import TabBar from '../../components/TabBar.vue'
import { mapMutations } from 'vuex';
export default {
  data(){
    return{
    username:"",
    icon:"",
    src:""
    }
  },
  components: {
    "tab-bar": TabBar,
  },
  created() {
     this.username = sessionStorage.getItem('username');
     console.log(this.username);
     this.$axios({
       methods:"get",
       url:globalConfig.base_url+`/deliveryServer/getuserinfo.php?username=${this.username}`,
     })
     .then((res) => {
       console.log(res);
       this.icon = res.data.u_icon;
       sessionStorage.setItem("nickname", res.data.u_nickname);
     })
     .catch((error) => {
       console.log(error);
     })
  },
  methods:{
    ...mapMutations("user", ["saveUserInfo"]),
  }
}
</script>

<style lang="scss" scoped>
.container {
  // border: solid;
  // border-color: pink;
  // padding: 20px;

  .user-info {
    padding-top: 30px;
    img {
      border-radius: 50%;
    }
    background-image: url(../../assets/imgs/mine/user-info-background-image.png);
    height: 150px;
    span {
      line-height: 20px;
      font-size: 20px;
    }
  }

  .menu {
    border-style: solid;
    width: 100%;
    height: 400px;
  }
}
</style>