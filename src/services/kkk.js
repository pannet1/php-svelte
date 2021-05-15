// kkk.js
// Implementations for all the calls for the pokemon endpoints.
import Api from "../services/Api";

export const getTest = async () => {
  try {
    const response = await Api.get("/mst_sex");
    return response.data;
  } catch (error) {
    console.error(error);
  }
};

// Method to get a list of all Members
export const getMemberList = async () => {
    try {
      const response = await Api.get("/member");
      return response;
    } catch (error) {
      console.error(error);
    }
};

// Method to register member
export const postMember = async (postData) => {
  try {
    const response = await Api.post("/member", postData);
    return response;
  } catch (error) {
    console.error(error);
  }
};

// Method to prefill the address form
export const getMember = async (id) => {
  try {
    const response = await Api.get("/member/"+id);
    return response;
  } catch (error) {
    console.error(error);
  }
};

// Method to add address to the prospect
export const postProfile = async (postData) => {
  try {
    const response = await Api.post("/profile", postData);
    return response;
  } catch (error) {
    console.error(error);
  }
};

export const postAuthLogin = async (postData) => {
  try {
    const response = await Api.post("/auth/login", postData);
    return response;
  } catch (error) {
    console.error(error);
  }
};

export const modValById = async (args) => {
  try {
    const response = await Api.get("/mod?"+args);
    return response;
  } catch (error) {
    console.error(error);
  }
};
