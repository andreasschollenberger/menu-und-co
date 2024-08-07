import axios from "axios";
import {useAuthStore} from "@/stores/AuthStore";

export const authClient = axios.create({
  baseURL: import.meta.env.VITE_BASE_URL,
  withCredentials: true, // required to handle the CSRF token
});

/*
 * Add a response interceptor
 */
// authClient.interceptors.response.use(
//   (response) => {
//     return response;
//   },
//   function (error) {
//     if (
//       error.response &&
//       [401, 419].includes(error.response.status) &&
//       store.getters["auth/authUser"] &&
//       !store.getters["auth/guest"]
//     ) {
//       store.dispatch("auth/logout");
//     }
//     return Promise.reject(error);
//   }
// );

/*
  AUTH METHODS
*/
export default {
  async login(payload) {
      await authClient.get("/sanctum/csrf-cookie");
      return authClient.post("/login", payload);
  },

  logout() {
    return authClient.post("/logout");
  },

  async forgotPassword(payload) {
    await authClient.get("/sanctum/csrf-cookie");
    return authClient.post("/forgot-password", payload);
  },

  getAuthUser() {
    return authClient.get("/users/auth");
  },

  async resetPassword(payload) {
    await authClient.get("/sanctum/csrf-cookie");
    return authClient.post("/reset-password", payload);
  },

  updatePassword(payload) {
    return authClient.put("/user/password", payload);
  },

  async registerUser(payload) {
    await authClient.get("/sanctum/csrf-cookie");
    const res = await authClient.post("/register", payload);
    await authClient.post("/logout");
    return res;
  },

  sendVerification(payload) {
    return authClient.post("/email/verification-notification", payload);
  },

  updateUser(payload) {
    return authClient.put("/user/profile-information", payload);
  },
};