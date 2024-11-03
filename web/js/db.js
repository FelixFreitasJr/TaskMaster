// web/js/db.js
import { createClient } from '@supabase/supabase-js'

const SUPABASE_URL = 'https://udewqztaiamosvawtzdv.supabase.co'
const SUPABASE_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InVkZXdxenRhaWFtb3N2YXd0emR2Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3MzA2NTc2OTMsImV4cCI6MjA0NjIzMzY5M30.0eHT6oPpKancC0BgXOfosjIWsTIMb_SZYhjeUvZ6aV0' // Substitua pela sua chave pública
export const supabase = createClient(SUPABASE_URL, SUPABASE_KEY)
