module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", "sans-serif"],
            },
            colors: {
                "fundy-main": "#FBFEFF",
                "fundy-primary": "#364C6F",
                "fundy-secondary": "#486FAD",
                "fundy-gray-bg": "#eeeeee",
                "fundy-text-gray": "#676767",
                "fundy-gray": "#D8D8D8",
                "fundy-success-bg": "#D2E892",
                "fundy-success": "#3C8476",
                "fundy-warning-bg": "#FFF2E2",
                "fundy-warning": "#D17300",
                "fundy-hover-primary": "#2c3e50",
                "fundy-hover-secondary": "#3e5a8e",
                "fundy-text": "#212529",
            },
        },
    },
    // Enable JIT mode for better performance and utility-first experience
    mode: "jit",
    // Ensure unused styles are purged in production
    purge: [
        "./public/**/*.html",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "./resources/views/**/*.blade.php",
    ],
};
