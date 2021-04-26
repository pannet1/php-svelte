// kkk.js
// Implementations for all the calls for the pokemon endpoints.
import Api from "../services/Api";

// Method to get a list of all Members
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
    return response.data;
  } catch (error) {
    console.error(error);
  }
};

// Method to add address to the prospect
export const postAddr = async (postData) => {
  try {
    const response = await Api.post("/addr", postData);
    return response;
  } catch (error) {
    console.error(error);
  }
};
