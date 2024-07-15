const apiKey = '5242e3889aab1a13c678e8e604d6fa83'; // OpenWeatherMap APIキーを入力
const baseUrl = 'https://api.openweathermap.org/data/2.5/';

const cityInput = document.getElementById('city-input');
const searchBtn = document.getElementById('search-btn');
const cityName = document.getElementById('city-name');
const temperature = document.getElementById('temperature');
const description = document.getElementById('description');
const weatherIcon = document.getElementById('weather-icon');
const forecastContainer = document.getElementById('forecast-container');
const cityList = document.getElementById('city-list');

searchBtn.addEventListener('click', () => {
    const city = cityInput.value;
    if (city) {
        getCurrentWeather(city);
        getForecast(city);
    }
});

async function getCurrentWeather(city) {
    try {
        const response = await fetch(`${baseUrl}weather?q=${city}&units=metric&lang=ja&appid=${apiKey}`);
        const data = await response.json();
        
        cityName.textContent = data.name;
        temperature.textContent = `気温: ${Math.round(data.main.temp)}°C`;
        description.textContent = data.weather[0].description;
        weatherIcon.src = `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
    } catch (error) {
        console.error('エラーが発生しました:', error);
    }
}

async function getForecast(city) {
    try {
        const response = await fetch(`${baseUrl}forecast?q=${city}&units=metric&lang=ja&appid=${apiKey}`);
        const data = await response.json();
        
        forecastContainer.innerHTML = '';
        for (let i = 0; i < data.list.length; i += 8) {
            const forecast = data.list[i];
            const date = new Date(forecast.dt * 1000);
            const dayName = date.toLocaleDateString('ja-JP', { weekday: 'short' });
            
            const forecastItem = document.createElement('div');
            forecastItem.classList.add('forecast-item');
            forecastItem.innerHTML = `
                <p>${dayName}</p>
                <img src="http://openweathermap.org/img/wn/${forecast.weather[0].icon}.png" alt="天気アイコン">
                <p>${Math.round(forecast.main.temp)}°C</p>
            `;
            forecastContainer.appendChild(forecastItem);
        }
    } catch (error) {
        console.error('エラーが発生しました:', error);
    }
}

// 日本の都市名リストを表示
const cities = ["Tokyo", "Osaka", "Nagoya", "Sapporo", "Fukuoka", "Kyoto", "Kobe", "Yokohama", "Sendai", "Hiroshima"];
cities.forEach(city => {
    const listItem = document.createElement('li');
    listItem.textContent = city;
    cityList.appendChild(listItem);
});