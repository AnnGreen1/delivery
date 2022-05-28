<template>
  <div class="container">
    <van-nav-bar class="nav-bar" :title="title" left-arrow @click-left="$router.push('/mine')" ></van-nav-bar>

    <div v-if="type == 1" class="password">
      <van-form @failed="onFailed">
        <van-cell-group inset>
          <!-- 通过 pattern 进行正则校验 -->
          <van-field
            type="password"
            v-model="value1"
            name="pattern"
            placeholder="原密码"
            :rules="[{ pattern, message: '请输入正确内容' }]"
          />
          <van-field
            type="password"
            v-model="value1"
            name="pattern"
            placeholder="新密码"
            :rules="[{ pattern, message: '请输入正确内容' }]"
          />
          <van-field
            type="password"
            v-model="value1"
            name="pattern"
            placeholder="确认新密码"
            :rules="[{ pattern, message: '请输入正确内容' }]"
          />
        </van-cell-group>
        <div style="margin: 16px">
          <van-button
            round
            block
            type="primary"
            color="#FFCC33"
            native-type="submit"
          >
            确认
          </van-button>
        </div>
      </van-form>
    </div>

    <div v-else-if="type == 2" class="address">
      <van-address-list
        v-model="chosenAddressId"
        :list="list"
        :disabled-list="disabledList"
        disabled-text="以下地址超出配送范围"
        default-tag-text="默认"
        @add="onAdd"
        @edit="onEdit"
      />
    </div>

    <div v-else-if="type == 3" class="icon">icon</div>
    <div v-else-if="type == 4" class="payword">
      <van-password-input
        :value="value"
        :focused="showKeyboard"
        @focus="showKeyboard = true"
      />

      <van-number-keyboard
        v-model="value"
        :show="showKeyboard"
        @blur="showKeyboard = false"
      />
    </div>
    <div v-else class="balance">balance</div>
  </div>
</template>

<script>
import { AddressList, PasswordInput, NumberKeyboard } from 'vant';
import AMapLoader from "@amap/amap-jsapi-loader";
import { ref } from 'vue';
export default {
  data() {
    const chosenAddressId = ref('1');
    const list = [
      {
        id: '1',
        name: '张三',
        tel: '13000000000',
        address: '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室',
        isDefault: true,
      },
      {
        id: '2',
        name: '李四',
        tel: '1310000000',
        address: '浙江省杭州市拱墅区莫干山路 50 号',
      },
    ];
    const disabledList = [
      {
        id: '3',
        name: '王五',
        tel: '1320000000',
        address: '浙江省杭州市滨江区江南大道 15 号',
      },
    ];

    return {
      title: '',
      type: -1,
      list,
      disabledList,
      chosenAddressId,
    }
  },
  setup() {
    const value = ref('123');
    const showKeyboard = ref(true);

    return {
      value,
      showKeyboard,
    };
  },
  methods: {

  },
  created() {
    console.log(this.$route.query.name);
    console.log(this.title);
    if (this.$route.query.name == 'password') {
      this.title = '登录密码';
      this.type = 1;
    } else if (this.$route.query.name == 'address') {
      this.title = '修改地址';
      this.type = 2;
    }
    else if (this.$route.query.name == 'icon') {
      this.title = '修改头像';
      this.type = 3;
    }
    else if (this.$route.query.name == 'payword') {
      this.title = '支付密码';
      this.type = 4;
    }
    else {
      this.title = '我的财富';
      this.type = 5;
    }
    console.log(this.title);
  },
}
</script>

<style lang="sass" scoped>
</style>