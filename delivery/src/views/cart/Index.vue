<template>
  <div class="container">
    <div class="title">
      <van-tabs v-model:active="activeName">
        <van-tab title="全部订单" name="a"
          ><van-card
            v-for="(item, index) in commodity"
            :key="index"
            :price="(item.o_total / 100).toFixed(2)"
            :desc="item.o_state"
            :title="item.o_title"
            :thumb="'/static/imgs/shop/' + item.o_icon"
          >
            <template #tags>
              <!-- <van-tag plain type="danger">标签</van-tag>
      <van-tag plain type="danger">标签</van-tag> -->
            </template>
            <template #footer>
              <van-button
                size="small"
                v-show="item.o_state == '未完成'"
                @click="repayword(item, index)"
                >支付</van-button
              >
              <van-button size="small" @click="deleteitem(item, index)"
                >删除</van-button
              >
              <van-popup
                z-index="1"
                class="popup"
                v-model:show="show"
                :style="{ height: '10%', width: '80%' }"
              >
                <!-- 密码输入框 -->
                <van-password-input
                  :value="value"
                  :focused="showKeyboard"
                  @focus="showKeyboard = true"
                />
              </van-popup>

              <!-- 数字键盘 -->
              <div class="keyboard">
                <van-number-keyboard
                  z-index="100"
                  v-model="value"
                  :show="showKeyboard"
                  @blur="showKeyboard = false"
                />
              </div>
            </template> </van-card
        ></van-tab>
        <van-tab title="已完成" name="b"
          ><van-card
            v-for="(item, index) in finshed"
            :key="index"
            :price="(item.o_total / 100).toFixed(2)"
            :desc="item.o_state"
            :title="item.o_title"
            :thumb="'/static/imgs/shop/' + item.o_icon"
          >
            <template #tags>
              <!-- <van-tag plain type="danger">标签</van-tag>
      <van-tag plain type="danger">标签</van-tag> -->
            </template>
            <template #footer>
              <van-button
                size="small"
                v-show="item.o_state == '未完成'"
                @click="repayword(item, index)"
                >支付</van-button
              >
              <van-button size="small" @click="deleteitem(item, index)"
                >删除</van-button
              >
              <van-popup
                z-index="1"
                class="popup"
                v-model:show="show"
                :style="{ height: '10%', width: '80%' }"
              >
                <!-- 密码输入框 -->
                <van-password-input
                  :value="value"
                  :focused="showKeyboard"
                  @focus="showKeyboard = true"
                />
              </van-popup>

              <!-- 数字键盘 -->
              <div class="keyboard">
                <van-number-keyboard
                  z-index="100"
                  v-model="value"
                  :show="showKeyboard"
                  @blur="showKeyboard = false"
                />
              </div>
            </template> </van-card
        ></van-tab>
        <van-tab title="未完成" name="c"
          ><van-card
            v-for="(item, index) in unfinshed"
            :key="index"
            :price="(item.o_total / 100).toFixed(2)"
            :desc="item.o_state"
            :title="item.o_title"
            :thumb="'/static/imgs/shop/' + item.o_icon"
          >
            <template #tags>
              <!-- <van-tag plain type="danger">标签</van-tag>
      <van-tag plain type="danger">标签</van-tag> -->
            </template>
            <template #footer>
              <van-button
                size="small"
                v-show="item.o_state == '未完成'"
                @click="repayword(item, index)"
                >支付</van-button
              >
              <van-button size="small" @click="deleteitem(item, index)"
                >删除</van-button
              >
              <van-popup
                z-index="1"
                class="popup"
                v-model:show="show"
                :style="{ height: '10%', width: '80%' }"
              >
                <!-- 密码输入框 -->
                <van-password-input
                  :value="value"
                  :focused="showKeyboard"
                  @focus="showKeyboard = true"
                />
              </van-popup>

              <!-- 数字键盘 -->
              <div class="keyboard">
                <van-number-keyboard
                  z-index="100"
                  v-model="value"
                  :show="showKeyboard"
                  @blur="showKeyboard = false"
                />
              </div>
            </template> </van-card
        ></van-tab>
      </van-tabs>
    </div>
  </div>

  <tab-bar></tab-bar>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
import { Dialog } from "vant";
import TabBar from "../../components/TabBar.vue";
import { ref } from "@vue/reactivity";
import { nextTick } from "@vue/runtime-core";
export default {
  components: {
    "tab-bar": TabBar,
  },
  data() {
    return {
      value: "",
      updateid: 0,
      total: 0,
      o_username:"",
      showKeyboard: false,
      show: false,
      commodity: [],
      finshed: [],
      unfinshed: [],
    };
  },
  created() {
    this.$axios({
      methods: "get",
      url: globalConfig.base_url+`/deliveryServer/cart.php?username=${sessionStorage.getItem(
        "username"
      )}`,
    })
      .then((res) => {
        this.commodity = res.data;
        this.finshed = this.commodity.filter(
          (item) => item.o_state == "已完成"
        );
        this.unfinshed = this.commodity.filter(
          (item) => item.o_state == "未完成"
        );
      })
      .catch((error) => {
        console.log(error);
      });
  },
  methods: {
    //订单模块中的删除操作
    deleteitem(item, key) {
      Dialog.confirm({
        title: "警告",
        message: "您确定要删除 “ " + item.o_title + " ” 吗？",
      })
        .then(() => {
          this.$axios({
            methods: "get",
            url: globalConfig.base_url+`/deliveryServer/deletecart.php?o_id=${item.o_id}`,
          }).then(() => {
            this.$router.go(0);
            Dialog.alert({
              title: "提示",
              message: "删除成功。",
            });
          });
        })
        .catch(() => {
          return;
        });
    },
    repayword(item, key) {
      this.showKeyboard = true;
      this.show = true;
      this.updateid = item.o_id;
      this.total = item.o_total;
      this.o_username=item.o_username;
    },
  },
  watch: {
    value() {
      if (this.value.length == 6) {
        this.$axios({
          methods: "post",
          url: globalConfig.base_url+`/deliveryServer/updateorder.php?username=${sessionStorage.getItem(
            "username"
          )}&payword=${this.value}&o_id=${this.updateid}&total=${this.total}&o_username=${this.o_username}`,
        })
          .then((res) => {
            Dialog.alert({
              title: "提示",
              message: "已支付，订单完成。",
            });
            this.value = "";
            this.showKeyboard = false;
            this.show = false;
            console.log(res);
          })
          .catch((error) => {
            this.value = "";
            console.log(error);
          });
      }
    },
  },
};
</script>

<style lang="scss" scoped>
.container {
  padding-bottom: 56px;
}
</style>