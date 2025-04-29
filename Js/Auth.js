export const Auth = {
  getUser: () => JSON.parse(localStorage.getItem("authenticated user")),
  getAdmin: () => JSON.parse(localStorage.getItem("authenticated admin")),
  setUser: (user) => localStorage.setItem("authenticated user", JSON.stringify(user)),
  setAdmin: (admin) => localStorage.setItem("authenticated admin", JSON.stringify(admin)),
  isUserLoggedIn: () => !!localStorage.getItem("authenticated user"),
  isAdminLoggedIn: () => !!localStorage.getItem("authenticated admin"),
  isAnyoneLoggedIn: () => {
    return (
      !!localStorage.getItem("authenticated user") ||
      !!localStorage.getItem("authenticated admin")
    );
  },
  logout: () => {
    localStorage.removeItem("authenticated user");
    localStorage.removeItem("authenticated admin");
  },
};